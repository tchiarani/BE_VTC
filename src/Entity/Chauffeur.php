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
     * @ORM\Column(type="integer")
     */
    private $idChauffeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ChauffeurActif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis", inversedBy="chauffeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Permis;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employe", inversedBy="chauffeur", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEmp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transactions", mappedBy="IdChauffeur", orphanRemoval=true)
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idChauffeur;
    }

    public function getChauffeurActif(): ?bool
    {
        return $this->ChauffeurActif;
    }

    public function setChauffeurActif(bool $ChauffeurActif): self
    {
        $this->ChauffeurActif = $ChauffeurActif;

        return $this;
    }

    public function getPermis(): ?Permis
    {
        return $this->Permis;
    }

    public function setPermis(?Permis $Permis): self
    {
        $this->Permis = $Permis;

        return $this;
    }

    public function getIdEmp(): ?Employe
    {
        return $this->IdEmp;
    }

    public function setIdEmp(Employe $IdEmp): self
    {
        $this->IdEmp = $IdEmp;

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
    }
}
