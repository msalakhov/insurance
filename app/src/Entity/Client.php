<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\HasLifecycleCallbacks()]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    #[ORM\Column(type: Types::STRING, length: 50)]
    #[Assert\NotBlank()]
    private $name;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private $city;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $photo;

    #[ORM\Column(type: Types::STRING, nullable: false)]
    private $email;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "clients")]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private $renewal_term;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getRenewalTerm(): ?\DateTimeInterface
    {
        return $this->renewal_term;
    }

    public function setRenewalTerm(?\DateTimeInterface $renewal_term): self
    {
        $this->renewal_term = $renewal_term;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }
}
