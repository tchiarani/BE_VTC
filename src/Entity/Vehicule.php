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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Revision", mappedBy="Immat", orphanRemoval=true)
     */
    private $revisions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="Immat", orphanRemoval=true)
     */
    private $transactions;

    public function __construct()
    {
        $this->revisions = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }

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

    /**
     * @return Collection|Revision[]
     */
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
     */
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
    }
}
