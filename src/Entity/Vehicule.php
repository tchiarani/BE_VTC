<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=10, name="IMMAT")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="KILOMETRAGE")
     */
    private $kilometrage;

    /**
     * @ORM\Column(type="boolean", name="ETATVEHICULE")
     */
    private $etatVehicule;

    /**
     * @ORM\Column(type="integer", name="NBPLACE")
     */
    private $nbPlace;

    /**
     * @ORM\Column(type="integer", name="NBKMCONSTRUCT")
     */
    private $nbKmConstruc;

    /**
     * @ORM\Column(type="integer", name="KMRESERVE")
     */
    private $kmReserve;

    // , inversedBy="vehicules"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $permisNecessaire;

    /*/**
     * @ORM\OneToMany(targetEntity="App\Entity\Revision", mappedBy="Immat", orphanRemoval=true)
     *//*
    private $revisions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="Immat", orphanRemoval=true)
     *//*
    private $transactions;

    public function __construct()
    {
        $this->revisions = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmat(): ?int
    {
        return $this->id;
    }

    public function setImmat(string $immat): self
    {
        $this->id = $immat;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setkilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getEtatVehicule(): ?bool
    {
        return $this->etatVehicule;
    }

    public function setetatVehicule(bool $etatVehicule): self
    {
        $this->etatVehicule = $etatVehicule;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function getNbKmConstruc(): ?int
    {
        return $this->nbKmConstruc;
    }

    public function setNbKmConstruc(int $nbKmConstruc): self
    {
        $this->nbKmConstruc = $nbKmConstruc;

        return $this;
    }

    public function getKmReserve(): ?int
    {
        return $this->kmReserve;
    }

    public function setKmReserve(int $kmReserve): self
    {
        $this->kmReserve = $kmReserve;

        return $this;
    }

    public function getPermisNecessaire(): ?Permis
    {
        return $this->permisNecessaire;
    }

    public function setpermisNecessaire(?Permis $permisNecessaire): self
    {
        $this->permisNecessaire = $permisNecessaire;

        return $this;
    }

    /*/**
     * @return Collection|Revision[]
     *//*
    public function getRevisions(): Collection
    {
        return $this->revisions;
    }

    public function addRevision(Revision $revision): self
    {
        if (!$this->revisions->contains($revision)) {
            $this->revisions[] = $revision;
            $revision->setImmat($this);
        }

        return $this;
    }

    public function removeRevision(Revision $revision): self
    {
        if ($this->revisions->contains($revision)) {
            $this->revisions->removeElement($revision);
            // set the owning side to null (unless already changed)
            if ($revision->getImmat() === $this) {
                $revision->setImmat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transactions[]
     *//*
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transactions $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setImmat($this);
        }

        return $this;
    }

    public function removeTransaction(Transactions $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getImmat() === $this) {
                $transaction->setImmat(null);
            }
        }

        return $this;
    }*/
}
