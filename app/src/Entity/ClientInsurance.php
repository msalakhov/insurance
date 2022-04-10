<?php

namespace App\Entity;

use App\Repository\ClientInsuranceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientInsuranceRepository::class)
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $clientId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $renewalDate;

    //HOME
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
    private $contents;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $liability;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lossOfUse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AOPDeductible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $windDeductible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otherNotes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $premium;

    //Auto
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $totalDrivers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vehicles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pip;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $medicalPayments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $OTCDeductible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $COLLDeductible;

    //Collectibles
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jewelry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fineArt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $silverware;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otherCollectable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $misc;

    // Umbrella
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $excessLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uninsured;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motorist;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minHomeLiabilitySubLimit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minAutoLiabilitySubLimit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lineOfBusiness;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $limits;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endorsements;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @var bool
     */
    private $isNotifyed;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=InsuranceObjectsTypes::class, inversedBy="insurance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $insuranceObjectsTypes;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getRenewalDate()
    {
        return $this->renewalDate;
    }

    /**
     * @param mixed $renewalDate
     */
    public function setRenewalDate($renewalDate): void
    {
        $this->renewalDate = $renewalDate;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDwellingLimit()
    {
        return $this->dwellingLimit;
    }

    /**
     * @param mixed $dwellingLimit
     */
    public function setDwellingLimit($dwellingLimit): void
    {
        $this->dwellingLimit = $dwellingLimit;
    }

    /**
     * @return mixed
     */
    public function getOtherStructuresLimit()
    {
        return $this->otherStructuresLimit;
    }

    /**
     * @param mixed $otherStructuresLimit
     */
    public function setOtherStructuresLimit($otherStructuresLimit): void
    {
        $this->otherStructuresLimit = $otherStructuresLimit;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param mixed $contents
     */
    public function setContents($contents): void
    {
        $this->contents = $contents;
    }

    /**
     * @return mixed
     */
    public function getLiability()
    {
        return $this->liability;
    }

    /**
     * @param mixed $liability
     */
    public function setLiability($liability): void
    {
        $this->liability = $liability;
    }

    /**
     * @return mixed
     */
    public function getLossOfUse()
    {
        return $this->lossOfUse;
    }

    /**
     * @param mixed $lossOfUse
     */
    public function setLossOfUse($lossOfUse): void
    {
        $this->lossOfUse = $lossOfUse;
    }

    /**
     * @return mixed
     */
    public function getAOPDeductible()
    {
        return $this->AOPDeductible;
    }

    /**
     * @param mixed $AOPDeductible
     */
    public function setAOPDeductible($AOPDeductible): void
    {
        $this->AOPDeductible = $AOPDeductible;
    }

    /**
     * @return mixed
     */
    public function getWindDeductible()
    {
        return $this->windDeductible;
    }

    /**
     * @param mixed $windDeductible
     */
    public function setWindDeductible($windDeductible): void
    {
        $this->windDeductible = $windDeductible;
    }

    /**
     * @return mixed
     */
    public function getOtherNotes()
    {
        return $this->otherNotes;
    }

    /**
     * @param mixed $otherNotes
     */
    public function setOtherNotes($otherNotes): void
    {
        $this->otherNotes = $otherNotes;
    }

    /**
     * @return mixed
     */
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * @param mixed $premium
     */
    public function setPremium($premium): void
    {
        $this->premium = $premium;
    }

    /**
     * @return mixed
     */
    public function getTotalDrivers()
    {
        return $this->totalDrivers;
    }

    /**
     * @param mixed $totalDrivers
     */
    public function setTotalDrivers($totalDrivers): void
    {
        $this->totalDrivers = $totalDrivers;
    }

    /**
     * @return mixed
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * @param mixed $vehicles
     */
    public function setVehicles($vehicles): void
    {
        $this->vehicles = $vehicles;
    }

    /**
     * @return mixed
     */
    public function getPip()
    {
        return $this->pip;
    }

    /**
     * @param mixed $pip
     */
    public function setPip($pip): void
    {
        $this->pip = $pip;
    }

    /**
     * @return mixed
     */
    public function getMedicalPayments()
    {
        return $this->medicalPayments;
    }

    /**
     * @param mixed $medicalPayments
     */
    public function setMedicalPayments($medicalPayments): void
    {
        $this->medicalPayments = $medicalPayments;
    }

    /**
     * @return mixed
     */
    public function getOTCDeductible()
    {
        return $this->OTCDeductible;
    }

    /**
     * @param mixed $OTCDeductible
     */
    public function setOTCDeductible($OTCDeductible): void
    {
        $this->OTCDeductible = $OTCDeductible;
    }

    /**
     * @return mixed
     */
    public function getCOLLDeductible()
    {
        return $this->COLLDeductible;
    }

    /**
     * @param mixed $COLLDeductible
     */
    public function setCOLLDeductible($COLLDeductible): void
    {
        $this->COLLDeductible = $COLLDeductible;
    }

    /**
     * @return mixed
     */
    public function getJewelry()
    {
        return $this->jewelry;
    }

    /**
     * @param mixed $jewelry
     */
    public function setJewelry($jewelry): void
    {
        $this->jewelry = $jewelry;
    }

    /**
     * @return mixed
     */
    public function getFineArt()
    {
        return $this->fineArt;
    }

    /**
     * @param mixed $fineArt
     */
    public function setFineArt($fineArt): void
    {
        $this->fineArt = $fineArt;
    }

    /**
     * @return mixed
     */
    public function getSilverware()
    {
        return $this->silverware;
    }

    /**
     * @param mixed $silverware
     */
    public function setSilverware($silverware): void
    {
        $this->silverware = $silverware;
    }

    /**
     * @return mixed
     */
    public function getWine()
    {
        return $this->wine;
    }

    /**
     * @param mixed $wine
     */
    public function setWine($wine): void
    {
        $this->wine = $wine;
    }

    /**
     * @return mixed
     */
    public function getOtherCollectable()
    {
        return $this->otherCollectable;
    }

    /**
     * @param mixed $otherCollectable
     */
    public function setOtherCollectable($otherCollectable): void
    {
        $this->otherCollectable = $otherCollectable;
    }

    /**
     * @return mixed
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * @param mixed $misc
     */
    public function setMisc($misc): void
    {
        $this->misc = $misc;
    }

    /**
     * @return mixed
     */
    public function getExcessLimit()
    {
        return $this->excessLimit;
    }

    /**
     * @param mixed $excessLimit
     */
    public function setExcessLimit($excessLimit): void
    {
        $this->excessLimit = $excessLimit;
    }

    /**
     * @return mixed
     */
    public function getUninsured()
    {
        return $this->uninsured;
    }

    /**
     * @param mixed $uninsured
     */
    public function setUninsured($uninsured): void
    {
        $this->uninsured = $uninsured;
    }

    /**
     * @return mixed
     */
    public function getMotorist()
    {
        return $this->motorist;
    }

    /**
     * @param mixed $motorist
     */
    public function setMotorist($motorist): void
    {
        $this->motorist = $motorist;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    public function getMinHomeLiabilitySubLimit(): ?int
    {
        return $this->minHomeLiabilitySubLimit;
    }

    public function setMinHomeLiabilitySubLimit(?int $minHomeLiabilitySubLimit): self
    {
        $this->minHomeLiabilitySubLimit = $minHomeLiabilitySubLimit;

        return $this;
    }

    public function getMinAutoLiabilitySubLimit(): ?int
    {
        return $this->minAutoLiabilitySubLimit;
    }

    public function setMinAutoLiabilitySubLimit(?int $minAutoLiabilitySubLimit): self
    {
        $this->minAutoLiabilitySubLimit = $minAutoLiabilitySubLimit;

        return $this;
    }

    public function getLineOfBusiness(): ?string
    {
        return $this->lineOfBusiness;
    }

    public function setLineOfBusiness(?string $lineOfBusiness): self
    {
        $this->lineOfBusiness = $lineOfBusiness;

        return $this;
    }

    public function getLimits(): ?string
    {
        return $this->limits;
    }

    public function setLimits(?string $limits): self
    {
        $this->limits = $limits;

        return $this;
    }

    public function getEndorsements(): ?string
    {
        return $this->endorsements;
    }

    public function setEndorsements(?string $endorsements): self
    {
        $this->endorsements = $endorsements;

        return $this;
    }

    public function isNotifyed(): ?bool
    {
        return $this->isNotifyed;
    }

    public function setIsNotifyed(bool $isNotifyed): self
    {
        $this->isNotifyed = $isNotifyed;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /** 
     * @ORM\PrePersist
    */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getInsuranceObjectsTypes(): ?InsuranceObjectsTypes
    {
        return $this->insuranceObjectsTypes;
    }

    public function setInsuranceObjectsTypes(?InsuranceObjectsTypes $insuranceObjectsTypes): self
    {
        $this->insuranceObjectsTypes = $insuranceObjectsTypes;

        return $this;
    }
}
