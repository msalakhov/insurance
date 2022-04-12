<?php

namespace App\Entity;

use App\Repository\InsuranceAttachmentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsuranceAttachmentsRepository::class)]
class InsuranceAttachments
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private $path;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private $name;

    #[ORM\Column(type: Types::INTEGER)]
    private $insuranceId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
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

    public function getInsuranceId(): ?int
    {
        return $this->insuranceId;
    }

    public function setInsuranceId(int $insuranceId): self
    {
        $this->insuranceId = $insuranceId;

        return $this;
    }
}
