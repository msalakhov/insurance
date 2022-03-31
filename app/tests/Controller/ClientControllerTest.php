<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientControllerTest extends WebTestCase
{
    private function loginUser(KernelBrowser $client): void
    {
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('aaa@aaa.com');

        $client->loginUser($testUser, 'user_secured_area');
    }

    public function testHomepage(): void
    {
        $client = static::createClient();

        $this->loginUser($client);

        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Your clients');
    }

    public function testClientCreate(): void
    {
        $client = static::createClient();

        $this->loginUser($client);
        
        $client->request('GET', '/client/create');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create new client');

        $client->submitForm(
            'create_client_form_submit', 
            [
                'create_client_form[name]' => 'Test Name',
                'create_client_form[city]' => 'New York',
                'create_client_form[email]' => 'test@example.com',
            ]
        );

        $this->assertResponseRedirects('/');
    }
}
