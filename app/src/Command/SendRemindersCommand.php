<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Client;
use App\Entity\ClientInsurance;
use App\Repository\ClientInsuranceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendRemindersCommand extends Command implements ContainerAwareInterface, LoggerAwareInterface
{
    use ContainerAwareTrait;
    use LoggerAwareTrait;

    /**
     * @var MailerInterface
     */
    private $mailer;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(MailerInterface $mailer, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setName('email:send-reminders')
            ->setDescription('Send reminders 45 days before renewal date');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $renewalDate = new \DateTime('+45 days');
        $renewalDate->setTime(0,0);
        $this->logger->info('Start emailing. Renewal date ' . $renewalDate->format('m/d/Y H:i:s'));

        /** @var ClientInsuranceRepository $repo */
        $repo = $this->entityManager->getRepository(ClientInsurance::class);
        /** @var ClientInsurance[] $ins */
        $ins = $repo->findInsLteDate($renewalDate);

        foreach ($ins as $item) {
            try {
                if ((bool)$item->isNotifyed() === true) {
                    continue;
                }

                $this->logger->info('Insurance name: '. $item->getName() . ' - id: ' . $item->getId());

                /** @var Client $client */
                $client = $this->entityManager->getRepository(Client::class)->find($item->getClientId());

                $user = $client->getUser();
                $email = $user ? $user->getEmail() : '';
                $email = (new Email())
                    ->from(new Address('no-reply@insurance.com', 'Insurance Mail Bot'))
                    ->to($email)
                    ->subject('Renewal date is coming')
                    ->text(sprintf(
                        "Hello dear client!\nYour insurance %s is expiring\nPlease contact me\nRenewal Date: %s",
                        $item->getName(), $item->getRenewalDate()->format('m/d/Y H:i:s'))
                    );

                $this->mailer->send($email);
                $this->logger->info('Email sent', ['client' => $client->getName(), 'email'=> $client->getEmail()]);
                $item->setIsNotifyed(true);
                sleep(1);
            } catch (TransportExceptionInterface $e) {
                $this->logger->error($e->getMessage());
                $item->setIsNotifyed(false);
            } finally {
                $this->entityManager->flush();
            }
        }

        return self::SUCCESS;
    }
}