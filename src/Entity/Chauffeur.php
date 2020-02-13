<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChauffeurRepository")
 */
class Chauffeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="IDCHAUFFEUR")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", name="CHAUFFEURACTIF")
     */
    private $chauffeurActif;

    // , inversedBy="chauffeurs"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $permis;

    /*/**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="IdChauffeur", orphanRemoval=true)
     *//*
    private $transactions;*/

    // , inversedBy="chauffeur"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employe;

    /*public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isChauffeurActif(): ?bool
    {
        return $this->chauffeurActif;
    }

    public function setChauffeurActif(bool $chauffeurActif): self
    {
        $this->chauffeurActif = $chauffeurActif;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(?Permis $permis): self
    {
        $this->Permis = $permis;

        return $this;
    }

    /*
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
            $transaction->setIdChauffeur($this);
        }

        return $this;
    }

    public function removeTransaction(Transactions $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getIdChauffeur() === $this) {
                $transaction->setIdChauffeur(null);
            }
        }

        return $this;
    }*/

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): self
    {
        $this->employe = $employe;

        return $this;
    }
}