<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionsRepository")
 */
class Transactions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="IdTransaction")
     */
    private $IdTransaction;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbKilometres;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbPassager;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $AdresseDep;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $AdresseArr;

    /**
     * @ORM\Column(type="date")
     */
    private $HeureDep;

    /**
     * @ORM\Column(type="date")
     */
    private $HeureArr;

    /**
     * @ORM\Column(type="boolean")
     */
    private $EtatTransac;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Immat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chauffeur", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdChauffeur;

    public function getId(): ?int
    {
        return $this->IdTransaction;
    }

    public function getNbKilometres(): ?int
    {
        return $this->NbKilometres;
    }

    public function setNbKilometres(int $NbKilometres): self
    {
        $this->NbKilometres = $NbKilometres;

        return $this;
    }

    public function getNbPassager(): ?int
    {
        return $this->NbPassager;
    }

    public function setNbPassager(int $NbPassager): self
    {
        $this->NbPassager = $NbPassager;

        return $this;
    }

    public function getAdresseDep(): ?string
    {
        return $this->AdresseDep;
    }

    public function setAdresseDep(string $AdresseDep): self
    {
        $this->AdresseDep = $AdresseDep;

        return $this;
    }

    public function getAdresseArr(): ?string
    {
        return $this->AdresseArr;
    }

    public function setAdresseArr(string $AdresseArr): self
    {
        $this->AdresseArr = $AdresseArr;

        return $this;
    }

    public function getHeureDep(): ?\DateTimeInterface
    {
        return $this->HeureDep;
    }

    public function setHeureDep(\DateTimeInterface $HeureDep): self
    {
        $this->HeureDep = $HeureDep;

        return $this;
    }

    public function getHeureArr(): ?\DateTimeInterface
    {
        return $this->HeureArr;
    }

    public function setHeureArr(\DateTimeInterface $HeureArr): self
    {
        $this->HeureArr = $HeureArr;

        return $this;
    }

    public function getEtatTransac(): ?bool
    {
        return $this->EtatTransac;
    }

    public function setEtatTransac(bool $EtatTransac): self
    {
        $this->EtatTransac = $EtatTransac;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

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

    public function getImmat(): ?Vehicule
    {
        return $this->Immat;
    }

    public function setImmat(?Vehicule $Immat): self
    {
        $this->Immat = $Immat;

        return $this;
    }

    public function getIdChauffeur(): ?Chauffeur
    {
        return $this->IdChauffeur;
    }

    public function setIdChauffeur(?Chauffeur $IdChauffeur): self
    {
        $this->IdChauffeur = $IdChauffeur;

        return $this;
    }
}
