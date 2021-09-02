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
     * @ORM\Column(type="integer")
     */
    private $insuranceObjectTypeId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $fieldName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsuranceObjectTypeId(): ?int
    {
        return $this->insuranceObjectTypeId;
    }

    public function setInsuranceObjectTypeId(int $insuranceObjectTypeId): self
    {
        $this->insuranceObjectTypeId = $insuranceObjectTypeId;

        return $this;
    }

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    public function setFieldName(string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }
}
