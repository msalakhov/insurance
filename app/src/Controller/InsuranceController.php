<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\InsuranceAttachments;
use App\Repository\ClientRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\InsuranceAttachmentsFormType;
use App\Form\CreateClientInsuranceFormType;
use App\Repository\ClientInsuranceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InsuranceAttachmentsRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/client/insurance')]
class InsuranceController extends AbstractController
{
    #[Route('/delete/{insId}', name: 'delete-ins', methods: ['DELETE'])]
    public function deleteInsurance(int $insId, ClientRepository $clientRepository, UserInterface $user, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry)
    {
        $clientInsurance = $clientInsuranceRepository->find($insId);
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

    #[Route('/edit/{insId}', name: 'edit-ins')]
    public function editInsurance(UserInterface $user, Request $request, int $insId, ClientRepository $clientRepository, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry): Response
    {
        $insuranse = $clientInsuranceRepository->find($insId);
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

    #[Route('/{insId}/upload-file', name: 'insurance-upload-file')]
    public function uploadIns(Request $request, int $insId, ClientRepository $clientRepository, UserInterface $user, ManagerRegistry $managerRegistry, ClientInsuranceRepository $clientInsuranceRepository): Response
    {
        $clientId = $clientInsuranceRepository->find($insId)->getClientId();
        $client = $clientRepository->find($clientId);

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

            return $this->redirectToRoute('insuranceList', ['id' => $clientId]);
        }

        return $this->render('client/insurance-upload-file.html.twig', [
            'controller_name' => 'ClientController',
            'attachmentForm' => $form->createView(),
            'title' => 'Attach insurance file'
        ]);
    }

    #[Route('/delete-attachment/{attachmentId}', name: 'delete-ins-attachment', methods: ['DELETE'])]
    public function deleteInsAttachment(int $attachmentId, ClientRepository $clientRepository, UserInterface $user, InsuranceAttachmentsRepository $insuranceAttachmentsRepository, ClientInsuranceRepository $clientInsuranceRepository, ManagerRegistry $managerRegistry)
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
}
