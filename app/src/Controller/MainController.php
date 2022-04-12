<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
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
}
