<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="IDCLIENT")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="nomClient", name="NOMCLIENT")
     */
    private $nomClient;

    /**
     * @ORM\Column(type="string", length=255, name="prenomClient", name="PRENOMCLIENT")
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=255, name="PORTABLE")
     */
    private $portable;
/*
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paiement", mappedBy="IdClient", orphanRemoval=true)
     *//*
    private $paiements;*/

    /*/**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="IdClient", orphanRemoval=true)
     *//*
    private $transactions;

    public function __construct()
    {
        //$this->paiements = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNOMCLIENT(): ?string
    {
        return $this->nomClient;
    }

    public function setNom(string $nom): self
    {
        $this->nomClient = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenomClient = $prenom;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    /*/**
     * @return Collection|Paiement[]
     *//*
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->setIdClient($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->contains($paiement)) {
            $this->paiements->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getIdClient() === $this) {
                $paiement->setIdClient(null);
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
            $transaction->setIdClient($this);
        }

        return $this;
    }

    public function removeTransaction(Transactions $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getIdClient() === $this) {
                $transaction->setIdClient(null);
            }
        }

        return $this;
    }*/
}
