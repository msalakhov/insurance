<?php

namespace App\Entity;

use App\Repository\InsuranceObjectsTypesFieldsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InsuranceObjectsTypesFieldsRepository::class)
 */
class InsuranceObjectsTypesFields
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $label;

    /**
     * @ORM\Column(type="boolean")
     */
    private $required;

    /**
     * @ORM\ManyToOne(targetEntity=InsuranceObjectsTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $insuranceType;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getRequired(): ?bool
    {
        return $this->required;
    }

    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    public function getInsuranceType(): ?InsuranceObjectsTypes
    {
        return $this->insuranceType;
    }

    public function setInsuranceType(?InsuranceObjectsTypes $insuranceType): self
    {
        $this->insuranceType = $insuranceType;

        return $this;
    }
}
