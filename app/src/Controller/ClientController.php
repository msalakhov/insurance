<?php

namespace App\Controller;

use App\Entity\Attachments;
use App\Form\InsuranceAttachmentsFormType;
use App\ImageOptimizer;
use App\Entity\Client;
use App\Entity\ClientInsurance;
use App\Form\AttachmentsFormType;
use App\Entity\InsuranceAttachments;
use App\Repository\ClientRepository;
use App\Form\CreateClientFormType;
use App\Form\CreateClientInsuranceFormType;
use App\Repository\AttachmentsRepository;
use App\Repository\ClientInsuranceRepository;
use App\Repository\InsuranceAttachmentsRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ClientController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(UserInterface $user, ClientRepository $clientRepository)
    {
        if (in_array('ADMIN', $user->getRoles())) {
            $clients = $clientRepository->findAll();
            return $this->render('admin/index.html.twig', [
                'title' => 'Admin section',
                'clients' => $clients,
            ]);
        } else {
            $clients = $clientRepository->findBy(['user' => $user->getId()]);
            return $this->render('client/index.html.twig', [
                'title' => 'Your clients',
                'clients' => $clients,
            ]);
        }
    }

    #[Route('/client/create')]
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

    #[Route('/client/delete/{id}', methods:['DELETE'])]
    public function delete($id, UserInterface $user, ClientRepository $clientRepository, ManagerRegistry $managerRegistry)
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

    #[Route('/client/edit/{id}')]
    public function edit(Request $request, $id, UserInterface $user, ClientRepository $clientRepository, ManagerRegistry $managerRegistry): Response
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

            $client->setPhoto($photo);
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

    #[Route('/client/{id}', name: 'insuranceList')]
    public function insuranceObjects($id, UserInterface $user, ClientRepository $clientRepository, ClientInsuranceRepository $clientInsuranceRepository, InsuranceAttachmentsRepository $insuranceAttachmentsRepository, AttachmentsRepository $attachmentsRepository)
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

    #[Route('/client/{id}/add-insurance', name: 'add-insurance')]
    public function addInsurance($id, ClientRepository $clientRepository, UserInterface $user, Request $request, ManagerRegistry $managerRegistry)
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

    #[Route('/client/insurance/delete/{id}', name: 'delete-ins', methods:['DELETE'])]
    public function deleteInsurance($id, ClientRepository $clientRepository, UserInterface $user, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry)
    {
        $clientInsurance = $clientInsuranceRepository->find($id);

        $client = $clientRepository->find($clientInsurance->getClientId());
        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $entityManager = $managerRegistry->getManager();

        $entityManager->remove($clientInsurance);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/client/insurance/edit/{id}', name: 'edit-ins')]
    public function editInsurance(UserInterface $user, Request $request, $id, ClientRepository $clientRepository, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry): Response
    {
        $insuranse = $clientInsuranceRepository->find($id);

        $client = $clientRepository->find($insuranse->getClientId());
        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }
        
        $form = $this->createForm(CreateClientInsuranceFormType::class, $insuranse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $managerRegistry->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $insuranse->getClientId()]);
        }

        return $this->render('client/editInsurance.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $insuranse->getClientId()
        ]);
    }

    #[Route('/client/{id}/insurance/{insId}/upload-file', name: 'insurance-upload-file')]
    public function uploadIns(Request $request, $id, $insId, ClientRepository $clientRepository, UserInterface $user, ManagerRegistry $managerRegistry): Response
    {
        $client = $clientRepository->find($id);
        if ($client->getUser()->getId() != $user->getId()) {
            if (!in_array('ADMIN', $user->getRoles())) {
                throw new AccessDeniedException();
            }
        }

        $attachment = new InsuranceAttachments();
        $form = $this->createForm(InsuranceAttachmentsFormType::class, $attachment);
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
                $attachment->setInsuranceId($insId);
                $attachment->setName($fileName);
            }   

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($attachment);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/insurance-upload-file.html.twig', [
            'controller_name' => 'ClientController',
            'attachmentForm' => $form->createView(),
            'title' => 'Attach insurance file'
        ]);
    }

    #[Route('/client/insurance/delete-attachment/{attachmentId}', name: 'delete-ins-attachment', methods:['DELETE'])]
    public function deleteInsAttachment($attachmentId, ClientRepository $clientRepository, UserInterface $user, InsuranceAttachmentsRepository $insuranceAttachmentsRepository, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry)
    {
        $attachment = $insuranceAttachmentsRepository->find($attachmentId);
        $insurance = $clientInsuranceRepository->find($attachment->getInsuranceId());

        $client = $clientRepository->find($insurance->getClientId());
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

    #[Route('/client/delete-attachment/{id}', name: 'delete-attachment', methods:['DELETE'])]
    public function deleteAttachment($id, ClientRepository $clientRepository, UserInterface $user, AttachmentsRepository $attachmentsRepository, ManagerRegistry $managerRegistry)
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

    #[Route('/client/{id}/upload-file', name: 'upload-file')]
    public function upload(Request $request, $id, ClientRepository $clientRepository, UserInterface $user, ManagerRegistry $managerRegistry): Response
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
