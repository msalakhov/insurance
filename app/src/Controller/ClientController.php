<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\ClientInsurance;
use App\Repository\ClientRepository;
use App\Form\CreateClientFormType;
use App\Form\CreateClientInsuranceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
        return $this->render('client/index.html.twig', [
            'title' => 'Your clients',
            'clients' => $clientRepository->findAll(),
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
        $client = new Client();
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);
        $client->setPhoto(
            new File($this->getParameter('photoDir') . '/' . $client->getPhoto())
        );

        $form = $this->createForm(CreateClientFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
        $client = new Client();
        $client = $clientRepository->find($id);

        $insuranceList = new ClientInsurance();
        $insuranceList = $this->getDoctrine()->getRepository(ClientInsurance::class)->findBy(['clientId' => $id]);
        $resInsuranceList = $insuranseObjects = null;

        if ($insuranceList) {
            /** @var ClientInsurance $insuranse */
            foreach ($insuranceList as $insuranse) {
                $resInsuranceList[$insuranse->getName()]['by_years'][$insuranse->getYear()] = $insuranse;
                $resInsuranceList[$insuranse->getName()]['address'] = $insuranse->getAddress();
            }

            $insuranseObjects = array_keys($resInsuranceList);
        }

        return $this->render('client/insuranceObjects.html.twig', [
            'title' => 'Insurance objects',
            'client' => $client,
            'insuranceList' => $resInsuranceList,
            'insuranseObjects' => $insuranseObjects
        ]);
    }

    #[Route('/client/{id}/add-insurance')]
    public function addInsurance(Request $request, $id)
    {
        $clientInsurance = new ClientInsurance();
        $clientInsurance->setClientId($id);

        $form = $this->createForm(CreateClientInsuranceFormType::class, $clientInsurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientInsurance);
            $entityManager->flush();

            return $this->redirectToRoute('insuranceList', ['id' => $id]);
        }

        return $this->render('client/add-insurance.html.twig', [
            'controller_name' => 'ClientController',
            'addInsuranceForm' => $form->createView(),
            'clientId' => $id
        ]);
    }

    #[Route('/client/insurance/delete/{id}', methods:['DELETE'])]
    public function deleteInsurance($id)
    {
        $clientInsurance = $this->getDoctrine()->getRepository(ClientInsurance::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($clientInsurance);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }

    #[Route('/client/{clientId}/insurance/edit/{id}')]
    public function editInsurance(Request $request, $id, $clientId): Response
    {
        $clientInsurance = new ClientInsurance();
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
}
