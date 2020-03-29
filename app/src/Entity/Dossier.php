<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossierRepository")
 */
class Dossier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dossierNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossierType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @Assert\Positive
     * @Assert\Length(max=16, min=16)
     */
    private $creditCard;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive
     * @Assert\Length(max=4, min=4)
     */
    private $cvvCard;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDossierNumber(): ?int
    {
        return $this->dossierNumber;
    }

    public function setDossierNumber(int $dossierNumber): self
    {
        $this->dossierNumber = $dossierNumber;

        return $this;
    }

    public function getDossierType(): ?string
    {
        return $this->dossierType;
    }

    public function setDossierType(?string $dossierType): self
    {
        $this->dossierType = $dossierType;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getCreditCard(): ?int
    {
        return $this->creditCard;
    }

    public function setCreditCard(?int $creditCard): self
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    public function getCvvCard(): ?string
    {
        return $this->cvvCard;
    }

    public function setCvvCard(?string $cvvCard): self
    {
        $this->cvvCard = $cvvCard;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
