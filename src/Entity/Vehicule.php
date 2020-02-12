<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=10, name="Immat")
     */
    private $Immat;

    /**
     * @ORM\Column(type="integer")
     */
    private $Kilometrage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $EtatVehicule;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbPlace;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbKmConstruc;

    /**
     * @ORM\Column(type="integer")
     */
    private $KmReserve;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PermisNecessaire;

    public function getImmat(): ?int
    {
        return $this->Immat;
    }

    public function setImmat(string $Immat): self
    {
        $this->Immat = $Immat;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->Kilometrage;
    }

    public function setKilometrage(int $Kilometrage): self
    {
        $this->Kilometrage = $Kilometrage;

        return $this;
    }

    public function getEtatVehicule(): ?bool
    {
        return $this->EtatVehicule;
    }

    public function setEtatVehicule(bool $EtatVehicule): self
    {
        $this->EtatVehicule = $EtatVehicule;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->NbPlace;
    }

    public function setNbPlace(int $NbPlace): self
    {
        $this->NbPlace = $NbPlace;

        return $this;
    }

    public function getNbKmConstruc(): ?int
    {
        return $this->NbKmConstruc;
    }

    public function setNbKmConstruc(int $NbKmConstruc): self
    {
        $this->NbKmConstruc = $NbKmConstruc;

        return $this;
    }

    public function getKmReserve(): ?int
    {
        return $this->KmReserve;
    }

    public function setKmReserve(int $KmReserve): self
    {
        $this->KmReserve = $KmReserve;

        return $this;
    }

    public function getPermisNecessaire(): ?Permis
    {
        return $this->PermisNecessaire;
    }

    public function setPermisNecessaire(?Permis $PermisNecessaire): self
    {
        $this->PermisNecessaire = $PermisNecessaire;

        return $this;
    }
}
