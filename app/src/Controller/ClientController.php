<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Attachments;
use App\ImageOptimizer;
use App\Entity\Client;
use App\Entity\ClientInsurance;
use App\Form\AttachmentsFormType;
use App\Repository\ClientRepository;
use App\Form\CreateClientFormType;
use App\Form\CreateClientInsuranceFormType;
use App\Repository\AttachmentsRepository;
use App\Repository\ClientInsuranceRepository;
use App\Repository\InsuranceAttachmentsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/client')]
class ClientController extends AbstractController
{
    #[Route('/create')]
    public function create(UserInterface $user, Request $request, ManagerRegistry $managerRegistry): Response
    {
        $client = new Client();
        $form = $this->createForm(CreateClientFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $photo */
            if ($photo = $form->get('photo')->getData()) {
                $fileName = bin2hex(random_bytes(6)) . '.' . $photo->guessExtension();

                try {
                    $photo->move(
                        $this->getParameter('photoDirAbs'),
                        $fileName
                    );
                } catch (FileException $e) {
                    //unable  to upload photo
                }

                $imageOptimazer = new ImageOptimizer();
                $imageOptimazer->resize($this->getParameter('photoDirAbs') . '/' . $fileName);

                $client->setPhoto($fileName);
            }

            $client->setUser($user);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('client/create.html.twig', [
            'controller_name' => 'ClientController',
            'clientForm' => $form->createView(),
            'title' => 'Create new client'
        ]);
    }

    #[Route('/delete/{id}', methods: ['DELETE'])]
    public function delete(int $id, UserInterface $user, ClientRepository $clientRepository, ManagerRegistry $managerRegistry)
    {
        $client = $clientRepository->find($id);

        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $entityManager = $managerRegistry->getManager();
        $entityManager->remove($client);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/edit/{id}')]
    public function edit(Request $request, int $id, UserInterface $user, ClientRepository $clientRepository, ManagerRegistry $managerRegistry): Response
    {
        $client = $clientRepository->find($id);

        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        if ($client->getPhoto()) {
            $photo = new File($this->getParameter('photoDirAbs') . '/' . $client->getPhoto());
            $fileName = $photo->getFilename();

            $client->setPhoto((string)$photo);
        }

        $form = $this->createForm(CreateClientFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $photo */
            if ($photo = $form->get('photo')->getData()) {
                $fileName = bin2hex(random_bytes(6)) . '.' . $photo->guessExtension();

                try {
                    $photo->move(
                        $this->getParameter('photoDirAbs'),
                        $fileName
                    );
                } catch (FileException $e) {
                    //unable  to upload photo
                }

                $imageOptimazer = new ImageOptimizer();
                $imageOptimazer->resize($this->getParameter('photoDirAbs') . '/' . $fileName);
            }

            $client->setPhoto($fileName);

            $entityManager = $managerRegistry->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('client/edit.html.twig', [
            'controller_name' => 'ClientController',
            'clientForm' => $form->createView(),
            'title' => 'Client editing'
        ]);
    }

    #[Route('/{id}', name: 'insuranceList')]
    public function insuranceObjects(int $id, UserInterface $user, ClientRepository $clientRepository, ClientInsuranceRepository $clientInsuranceRepository, InsuranceAttachmentsRepository $insuranceAttachmentsRepository, AttachmentsRepository $attachmentsRepository)
    {
        $client = $clientRepository->find($id);

        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $insuranceList = $clientInsuranceRepository->findBy(['clientId' => $id], ['year' => 'desc']);
        $resInsuranceList = null;

        if ($insuranceList) {
            /** @var ClientInsurance $insuranse */
            foreach ($insuranceList as $insuranse) {
                $type = $insuranse->getName();
                $insuranceYear = $insuranse->getYear();
                $resInsuranceList[$type][$insuranceYear->format('Y')] = $insuranse;
                $insAttachmentsList = $insuranceAttachmentsRepository->findBy(['insuranceId' => $insuranse->getId()]);
                foreach ($insAttachmentsList as $attachment) {
                    $arResAttachmentList[$insuranse->getId()][] = [
                        'id' => $attachment->getId(),
                        'name' => base64_decode($attachment->getName()),
                        'path' => $attachment->getPath()
                    ];
                }
            }
        }

        $attachmentsList = $attachmentsRepository->findBy(['userId' => $id]);
        foreach ($attachmentsList as $attachment) {
            $arResAttachmentList2[] = [
                'id' => $attachment->getId(),
                'name' => base64_decode($attachment->getName()),
                'path' => $attachment->getPath()
            ];
        }

        return $this->render('client/insuranceObjects.html.twig', [
            'title' => 'Insurance objects',
            'client' => $client,
            'insuranceList' => $resInsuranceList,
            'insAttachmentsList' => $arResAttachmentList ?? [],
            'attachmentList' => $arResAttachmentList2 ?? []
        ]);
    }

    #[Route('/{id}/add-insurance', name: 'add-insurance')]
    public function addInsurance(int $id, ClientRepository $clientRepository, UserInterface $user, Request $request, ManagerRegistry $managerRegistry)
    {
        $client = $clientRepository->find($id);
        
        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(CreateClientInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance-item.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id,
            'title' => "Add client's insurance"
        ]);
    }

    #[Route('/delete-attachment/{id}', name: 'delete-attachment', methods: ['DELETE'])]
    public function deleteAttachment(int $id, ClientRepository $clientRepository, UserInterface $user, AttachmentsRepository $attachmentsRepository, ManagerRegistry $managerRegistry)
    {
        $attachment = $attachmentsRepository->find($id);
        $client = $clientRepository->find($attachment->getUserId());

        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $entityManager = $managerRegistry->getManager();
        $entityManager->remove($attachment);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/{id}/upload-file', name: 'upload-file')]
    public function upload(Request $request, int $id, ClientRepository $clientRepository, UserInterface $user, ManagerRegistry $managerRegistry): Response
    {
        $client = $clientRepository->find($id);

        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $attachment = new Attachments();
        $form = $this->createForm(AttachmentsFormType::class, $attachment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            if ($file = $form->get('path')->getData()) {
                $fileName = base64_encode($file->getClientOriginalName());
                $encodedFileName = bin2hex(random_bytes(6)) . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('photoDirAbs'),
                        $encodedFileName
                    );
                } catch (FileException $e) {
                    //unable  to upload
                }

                $attachment->setPath($encodedFileName);
                $attachment->setUserId($id);
                $attachment->setName($fileName);
            }

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($attachment);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/upload-file.html.twig', [
            'controller_name' => 'ClientController',
            'attachmentForm' => $form->createView(),
            'title' => "Upload client's files"
        ]);
    }
}
