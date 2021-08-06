<?php

namespace App\Entity;

use App\Repository\ClientInsuranceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientInsuranceRepository::class)
 */
class ClientInsurance
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
    private $clientId;

    /**
     * @ORM\Column(type="integer")
     */
    private $insuranceObjectsTypesId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dwellingLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otherStructuresLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $personalPropertyLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deductible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $premium;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $totalCars;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $totalDrivers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $deductiblePremium;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fineArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jewelry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eachWithRLP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $expressLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homesListed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $llcs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getInsuranceObjectsTypesId(): ?int
    {
        return $this->insuranceObjectsTypesId;
    }

    public function setInsuranceObjectsTypesId(int $insuranceObjectsTypesId): self
    {
        $this->insuranceObjectsTypesId = $insuranceObjectsTypesId;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDwellingLimit(): ?string
    {
        return $this->dwellingLimit;
    }

    public function setDwellingLimit(string $dwellingLimit): self
    {
        $this->dwellingLimit = $dwellingLimit;

        return $this;
    }

    public function getOtherStructuresLimit(): ?string
    {
        return $this->otherStructuresLimit;
    }

    public function setOtherStructuresLimit(?string $otherStructuresLimit): self
    {
        $this->otherStructuresLimit = $otherStructuresLimit;

        return $this;
    }

    public function getPersonalPropertyLimit(): ?string
    {
        return $this->personalPropertyLimit;
    }

    public function setPersonalPropertyLimit(?string $personalPropertyLimit): self
    {
        $this->personalPropertyLimit = $personalPropertyLimit;

        return $this;
    }

    public function getDeductible(): ?string
    {
        return $this->deductible;
    }

    public function setDeductible(?string $deductible): self
    {
        $this->deductible = $deductible;

        return $this;
    }

    public function getPremium(): ?string
    {
        return $this->premium;
    }

    public function setPremium(?string $premium): self
    {
        $this->premium = $premium;

        return $this;
    }

    public function getTotalCars(): ?string
    {
        return $this->totalCars;
    }

    public function setTotalCars(?string $totalCars): self
    {
        $this->totalCars = $totalCars;

        return $this;
    }

    public function getTotalDrivers(): ?string
    {
        return $this->totalDrivers;
    }

    public function setTotalDrivers(?string $totalDrivers): self
    {
        $this->totalDrivers = $totalDrivers;

        return $this;
    }

    public function getDeductiblePremium(): ?string
    {
        return $this->deductiblePremium;
    }

    public function setDeductiblePremium(?string $deductiblePremium): self
    {
        $this->deductiblePremium = $deductiblePremium;

        return $this;
    }

    public function getFineArt(): ?string
    {
        return $this->fineArt;
    }

    public function setFineArt(?string $fineArt): self
    {
        $this->fineArt = $fineArt;

        return $this;
    }

    public function getJewelry(): ?string
    {
        return $this->jewelry;
    }

    public function setJewelry(?string $jewelry): self
    {
        $this->jewelry = $jewelry;

        return $this;
    }

    public function getWine(): ?string
    {
        return $this->wine;
    }

    public function setWine(?string $wine): self
    {
        $this->wine = $wine;

        return $this;
    }

    public function getEtc(): ?string
    {
        return $this->etc;
    }

    public function setEtc(?string $etc): self
    {
        $this->etc = $etc;

        return $this;
    }

    public function getEachWithRLP(): ?string
    {
        return $this->eachWithRLP;
    }

    public function setEachWithRLP(?string $eachWithRLP): self
    {
        $this->eachWithRLP = $eachWithRLP;

        return $this;
    }

    public function getExpressLimit(): ?string
    {
        return $this->expressLimit;
    }

    public function setExpressLimit(?string $expressLimit): self
    {
        $this->expressLimit = $expressLimit;

        return $this;
    }

    public function getHomesListed(): ?string
    {
        return $this->homesListed;
    }

    public function setHomesListed(?string $homesListed): self
    {
        $this->homesListed = $homesListed;

        return $this;
    }

    public function getLlcs(): ?string
    {
        return $this->llcs;
    }

    public function setLlcs(?string $llcs): self
    {
        $this->llcs = $llcs;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

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
}
