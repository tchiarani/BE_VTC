<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RevisionRepository")
 */
class Revision
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRev;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $avis;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbKmRev;

    // , inversedBy="revisions"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule")
     * @ORM\JoinColumn(nullable=false)
     */
    private $immat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRev(): ?\DateTimeInterface
    {
        return $this->dateRev;
    }

    public function setDateRev(\DateTimeInterface $dateRev): self
    {
        $this->dateRev = $dateRev;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getNbKmRev(): ?int
    {
        return $this->nbKmRev;
    }

    public function setnbKmRev(int $nbKmRev): self
    {
        $this->nbKmRev = $nbKmRev;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->immat;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->immat = $vehicule;

        return $this;
    }
}