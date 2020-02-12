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
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $TypeCB;

    /**
     * @ORM\Column(type="date")
     */
    private $DateCB;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCB(): ?string
    {
        return $this->TypeCB;
    }

    public function setTypeCB(string $TypeCB): self
    {
        $this->TypeCB = $TypeCB;

        return $this;
    }

    public function getDateCB(): ?\DateTimeInterface
    {
        return $this->DateCB;
    }

    public function setDateCB(\DateTimeInterface $DateCB): self
    {
        $this->DateCB = $DateCB;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->IdClient;
    }

    public function setIdClient(?Client $IdClient): self
    {
        $this->IdClient = $IdClient;

        return $this;
    }
}
