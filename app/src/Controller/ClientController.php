<?php

namespace App\Controller;

use App\Entity\Attachments;
use App\Form\AutoInsuranceFormType;
use App\Form\CollectablesInsuranceFormType;
use App\Form\HomeInsuranceFormType;
use App\Form\UmbrellaInsuranceFormType;
use App\ImageOptimizer;
use App\Entity\Client;
use App\Entity\ClientInsurance;
use App\Form\AttachmentsFormType;
use App\InsuranceTypes;
use App\Repository\ClientRepository;
use App\Form\CreateClientFormType;
use App\Form\CreateClientInsuranceFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/', name: 'client')]
    public function index(ClientRepository $clientRepository)
    {
        $clients = $clientRepository->findAll();

        return $this->render('client/index.html.twig', [
            'title' => 'Your clients',
            'clients' => $clients,
        ]);
    }

    #[Route('/client/create')]
    public function create(Request $request): Response
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
                        $this->getParameter('photoDir'), 
                        $fileName
                    );
                } catch (FileException $e) {
                    //unable  to upload photo
                }

                $imageOptimazer = new ImageOptimizer();
                $imageOptimazer->resize($this->getParameter('photoDir') . '/' . $fileName);

                $client->setPhoto($fileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('client');
        }

        return $this->render('client/create.html.twig', [
            'controller_name' => 'ClientController',
            'clientForm' => $form->createView(),
        ]);
    }

    #[Route('/client/delete/{id}', methods:['DELETE'])]
    public function delete($id)
    {
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($client);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/client/edit/{id}')]
    public function edit(Request $request, $id): Response
    {
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);
        if ($client->getPhoto()) {
            $photo = new File($this->getParameter('photoDir') . '/' . $client->getPhoto());
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
                        $this->getParameter('photoDir'), 
                        $fileName
                    );
                } catch (FileException $e) {
                    //unable  to upload photo
                }

                $imageOptimazer = new ImageOptimizer();
                $imageOptimazer->resize($this->getParameter('photoDir') . '/' . $fileName);

                
            }

            $client->setPhoto($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('client');
        }

        return $this->render('client/edit.html.twig', [
            'controller_name' => 'ClientController',
            'clientForm' => $form->createView(),
        ]);
    }

    #[Route('/client/{id}', name: 'insuranceList')]
    public function insuranceObjects(ClientRepository $clientRepository, $id)
    {
        $client = $clientRepository->find($id);

        $insuranceList = $this->getDoctrine()->getRepository(ClientInsurance::class)->findBy(['clientId' => $id], ['year' => 'desc']);
        $resInsuranceList = $insuranseObjects = null;

        if ($insuranceList) {
            /** @var ClientInsurance $insuranse */
            foreach ($insuranceList as $insuranse) {
                $type = $insuranse->getInsuranceObjectsTypesId();
                if (isset(InsuranceTypes::NAMES[$type]) === false) {
                   continue;
                }
                $typeName = InsuranceTypes::NAMES[$type];
                $resInsuranceList[$typeName][$insuranse->getYear()] = $insuranse;
            }
        }

        $attachmentsList = $this->getDoctrine()->getRepository(Attachments::class)->findBy(['userId' => $id]);
        foreach ($attachmentsList as $attachment) {
            $arResAttachmentList[] = [
                'id' => $attachment->getId(),
                'name' => base64_decode($attachment->getName()),
                'path' => $attachment->getPath()
            ];
        }

        return $this->render('client/insuranceObjects.html.twig', [
            'title' => 'Insurance objects',
            'client' => $client,
            'insuranceList' => $resInsuranceList,
            'attachmentList' => $arResAttachmentList
        ]);
    }

    #[Route('/client/{id}/add-insurance', name: 'add-insurance')]
    public function addInsurance($id)
    {
        return $this->render('client/add-insurance.html.twig', [
            'clientId' => $id
        ]);
    }

    #[Route('/client/{id}/add-insurance-home', name: 'add-insurance-home')]
    public function addInsuranceHome(Request $request, $id)
    {
        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(HomeInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clientInsurance->setInsuranceObjectsTypesId(InsuranceTypes::HOME);
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance-item.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id
        ]);
    }

    #[Route('/client/{id}/add-insurance-auto', name: 'add-insurance-auto')]
    public function addInsuranceAuto(Request $request, $id)
    {
        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(AutoInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clientInsurance->setInsuranceObjectsTypesId(InsuranceTypes::AUTO);
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance-item.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id
        ]);
    }

    #[Route('/client/{id}/add-insurance-coll', name: 'add-insurance-coll')]
    public function addInsuranceColl(Request $request, $id)
    {
        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(CollectablesInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clientInsurance->setInsuranceObjectsTypesId(InsuranceTypes::COLLECTABLES);
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance-item.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id
        ]);
    }

    #[Route('/client/{id}/add-insurance-umbrella', name: 'add-insurance-umbrella')]
    public function addInsuranceUmbrella(Request $request, $id)
    {
        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(UmbrellaInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $clientInsurance->setInsuranceObjectsTypesId(InsuranceTypes::UMBRELLA);
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance-item.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id
        ]);
    }

    #[Route('/client/insurance/delete/{id}', name: 'delete-ins', methods:['DELETE'])]
    public function deleteInsurance($id)
    {
        $clientInsurance = $this->getDoctrine()->getRepository(ClientInsurance::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($clientInsurance);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/client/insurance/edit/{id}', name: 'edit-ins')]
    public function editInsurance(Request $request, $id, $clientId): Response
    {
        $clientInsurance = $this->getDoctrine()->getRepository(ClientInsurance::class)->find($id);

        $form = $this->createForm(CreateClientInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $clientId]);
        }

        return $this->render('client/editInsurance.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $clientId
        ]);
    }

    #[Route('/client/{id}/upload-file', name: 'upload-file')]
    public function upload(Request $request, $id): Response
    {
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
                        $this->getParameter('photoDir'), 
                        $encodedFileName
                    );
                } catch (FileException $e) {
                    //unable  to upload
                }

                $attachment->setPath($encodedFileName);
                $attachment->setUserId($id);
                $attachment->setName($fileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($attachment);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/upload-file.html.twig', [
            'controller_name' => 'ClientController',
            'attachmentForm' => $form->createView(),
        ]);
    }

    #[Route('/client/delete-attachment/{id}', name: 'delete-attachment', methods:['DELETE'])]
    public function deleteAttachment($id)
    {
        $attachment = $this->getDoctrine()->getRepository(Attachments::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($attachment);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }
}
