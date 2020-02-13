<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $typeCB;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCB;

    /* MTO : , inversedBy="paiements" */
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCB(): ?string
    {
        return $this->typeCB;
    }

    public function setTypeCB(string $typeCB): self
    {
        $this->typeCB = $typeCB;

        return $this;
    }

    public function getDateCB(): ?\DateTimeInterface
    {
        return $this->dateCB;
    }

    public function setDateCB(\DateTimeInterface $dateCB): self
    {
        $this->dateCB = $dateCB;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }
}