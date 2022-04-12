<?php

namespace App\Entity;

use App\Repository\ClientInsuranceRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientInsuranceRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ClientInsurance
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Assert\NotBlank()]
    private $name;

    #[ORM\Column(type: Types::INTEGER)]
    private $clientId;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private $renewalDate;

    /** Home */
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $address;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $dwellingLimit;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $otherStructuresLimit;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $contents;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $liability;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $lossOfUse;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $AOPDeductible;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $windDeductible;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $otherNotes;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $premium;

    /** Auto */
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $totalDrivers;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $vehicles;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $pip;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $medicalPayments;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $OTCDeductible;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $COLLDeductible;

    /** Collectibles */
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $jewelry;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $fineArt;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $silverware;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $wine;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $otherCollectable;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $misc;

    /** Umbrella */
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $excessLimit;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $uninsured;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $motorist;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private $year;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private $minHomeLiabilitySubLimit;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private $minAutoLiabilitySubLimit;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $lineOfBusiness;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $limits;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private $endorsements;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true)]
    private $isNotifyed;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: InsuranceObjectsTypes::class, inversedBy: "insurance")]
    #[ORM\JoinColumn(nullable: false)]
    private $insuranceObjectsTypes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getRenewalDate(): ?\DateTimeInterface
    {
        return $this->renewalDate;
    }

    public function setRenewalDate(?\DateTimeInterface $renewalDate): void
    {
        $this->renewalDate = $renewalDate;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getDwellingLimit(): ?string
    {
        return $this->dwellingLimit;
    }

    public function setDwellingLimit(string $dwellingLimit): void
    {
        $this->dwellingLimit = $dwellingLimit;
    }

    public function getOtherStructuresLimit(): ?string
    {
        return $this->otherStructuresLimit;
    }

    public function setOtherStructuresLimit(string $otherStructuresLimit): void
    {
        $this->otherStructuresLimit = $otherStructuresLimit;
    }

    public function getContents(): ?string
    {
        return $this->contents;
    }

    public function setContents(string $contents): void
    {
        $this->contents = $contents;
    }

    public function getLiability(): ?string
    {
        return $this->liability;
    }

    public function setLiability(string $liability): void
    {
        $this->liability = $liability;
    }

    public function getLossOfUse(): ?string
    {
        return $this->lossOfUse;
    }

    public function setLossOfUse(string $lossOfUse): void
    {
        $this->lossOfUse = $lossOfUse;
    }

    public function getAOPDeductible(): ?string
    {
        return $this->AOPDeductible;
    }

    public function setAOPDeductible(string $AOPDeductible): void
    {
        $this->AOPDeductible = $AOPDeductible;
    }

    public function getWindDeductible(): ?string
    {
        return $this->windDeductible;
    }

    public function setWindDeductible(string $windDeductible): void
    {
        $this->windDeductible = $windDeductible;
    }

    public function getOtherNotes(): ?string
    {
        return $this->otherNotes;
    }

    public function setOtherNotes(string $otherNotes): void
    {
        $this->otherNotes = $otherNotes;
    }

    public function getPremium(): ?string
    {
        return $this->premium;
    }

    public function setPremium(string $premium): void
    {
        $this->premium = $premium;
    }

    public function getTotalDrivers(): ?string
    {
        return $this->totalDrivers;
    }

    public function setTotalDrivers(string $totalDrivers): void
    {
        $this->totalDrivers = $totalDrivers;
    }

    public function getVehicles(): ?string
    {
        return $this->vehicles;
    }

    public function setVehicles(string $vehicles): void
    {
        $this->vehicles = $vehicles;
    }

    public function getPip(): ?string
    {
        return $this->pip;
    }

    public function setPip(string $pip): void
    {
        $this->pip = $pip;
    }

    public function getMedicalPayments(): ?string
    {
        return $this->medicalPayments;
    }

    public function setMedicalPayments(string $medicalPayments): void
    {
        $this->medicalPayments = $medicalPayments;
    }

    public function getOTCDeductible(): ?string
    {
        return $this->OTCDeductible;
    }

    public function setOTCDeductible(string $OTCDeductible): void
    {
        $this->OTCDeductible = $OTCDeductible;
    }

    public function getCOLLDeductible(): ?string
    {
        return $this->COLLDeductible;
    }

    public function setCOLLDeductible(string $COLLDeductible): void
    {
        $this->COLLDeductible = $COLLDeductible;
    }

    public function getJewelry(): ?string
    {
        return $this->jewelry;
    }

    public function setJewelry(string $jewelry): void
    {
        $this->jewelry = $jewelry;
    }

    public function getFineArt(): ?string
    {
        return $this->fineArt;
    }

    public function setFineArt(string $fineArt): void
    {
        $this->fineArt = $fineArt;
    }

    public function getSilverware(): ?string
    {
        return $this->silverware;
    }

    public function setSilverware(string $silverware): void
    {
        $this->silverware = $silverware;
    }

    public function getWine(): ?string
    {
        return $this->wine;
    }

    public function setWine(string $wine): void
    {
        $this->wine = $wine;
    }

    public function getOtherCollectable(): ?string
    {
        return $this->otherCollectable;
    }

    public function setOtherCollectable(string $otherCollectable): void
    {
        $this->otherCollectable = $otherCollectable;
    }

    public function getMisc(): ?string
    {
        return $this->misc;
    }

    public function setMisc(string $misc): void
    {
        $this->misc = $misc;
    }

    public function getExcessLimit(): ?string
    {
        return $this->excessLimit;
    }

    public function setExcessLimit(string $excessLimit): void
    {
        $this->excessLimit = $excessLimit;
    }

    public function getUninsured(): ?string
    {
        return $this->uninsured;
    }

    public function setUninsured(string $uninsured): void
    {
        $this->uninsured = $uninsured;
    }

    public function getMotorist(): ?string
    {
        return $this->motorist;
    }

    public function setMotorist(string $motorist): void
    {
        $this->motorist = $motorist;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(?\DateTimeInterface $year): void
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

    #[ORM\PrePersist]
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
