<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Client;
use App\Entity\ClientInsurance;
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
        $this->logger->info('Start emailing');
        $renewalDate = new \DateTime('+45 days');
        $renewalDate->setTime(0,0);
        $this->logger->info('Renewal date ' . $renewalDate->format('m/d/Y H:i:s'));

        /** @var ClientInsurance[] $ins */
        $ins = $this->entityManager->getRepository(ClientInsurance::class)->findBy(['renewalDate' => $renewalDate]);
        foreach ($ins as $item) {
            $this->logger->info('Insurance name'. $item->getName() . '- id:' . $item->getId());
            /** @var Client $client */
            $client = $this->entityManager->getRepository(Client::class)->find($item->getClientId());

            $output->writeln('start');
            $email = (new Email())
                ->from('vismark47@gmail.com')
                ->to($this->container->getParameter('sendTo'))
                ->subject('Renewal date is coming')
                ->text(sprintf(
                    "Client name: %s \n Insurance name: %s \n Renewal Date: %s",
                    $client->getName(), $item->getName(), $item->getRenewalDate()->format('m/d/Y H:i:s'))
                );

            try {
                $this->mailer->send($email);
                $this->logger->info('Email sent');
                $output->writeln('Sent');
                sleep(1);
            } catch (TransportExceptionInterface $e) {
                $this->logger->error($e->getMessage());
                $output->writeln($e->getMessage());
            }
        }

        return self::SUCCESS;
    }
}