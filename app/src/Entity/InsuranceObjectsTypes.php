<?php

namespace App\Entity;

use App\Repository\InsuranceObjectsTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsuranceObjectsTypesRepository::class)]
class InsuranceObjectsTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private $name;

    #[ORM\OneToMany(targetEntity: ClientInsurance::class, mappedBy: "insuranceObjectsTypes")]
    private $insurance;

    public function __construct()
    {
        $this->insurance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getInsurance(): Collection
    {
        return $this->insurance;
    }

    public function addInsurance(ClientInsurance $insurance): self
    {
        if (!$this->insurance->contains($insurance)) {
            $this->insurance[] = $insurance;
            $insurance->setInsuranceObjectsTypes($this);
        }

        return $this;
    }

    public function removeInsurance(ClientInsurance $insurance): self
    {
        if ($this->insurance->removeElement($insurance)) {
            // set the owning side to null (unless already changed)
            if ($insurance->getInsuranceObjectsTypes() === $this) {
                $insurance->setInsuranceObjectsTypes(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
