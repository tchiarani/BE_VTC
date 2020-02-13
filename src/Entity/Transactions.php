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
     * @ORM\Column(type="integer", name="IDTRANSACTION")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", name="NBKILOMETRES")
     */
    private $nbKilometres;

    /**
     * @ORM\Column(type="integer", name="NBPASSAGER")
     */
    private $nbPassager;

    /**
     * @ORM\Column(type="string", length=50, name="ADRESSEDEP")
     */
    private $adresseDep;

    /**
     * @ORM\Column(type="string", length=50, name="ADRESSEARR")
     */
    private $adresseArr;

    /**
     * @ORM\Column(type="date", name="HEUREDEP")
     */
    private $heureDep;

    /**
     * @ORM\Column(type="date", name="HEUREARR")
     */
    private $heureArr;

    /**
     * @ORM\Column(type="boolean", name="ETATTRANSAC")
     */
    private $etatTransac;

    /**
     * @ORM\Column(type="float", name="PRIX")
     */
    private $prix;

    // , inversedBy="transactions"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idClient;

    // , inversedBy="transactions"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule")
     * @ORM\JoinColumn(nullable=false)
     */
    private $immat;

    // , inversedBy="transactions"
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chauffeur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idChauffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbKilometres(): ?int
    {
        return $this->nbKilometres;
    }

    public function setNbKilometres(int $nbKilometres): self
    {
        $this->nbKilometres = $nbKilometres;

        return $this;
    }

    public function getNbPassager(): ?int
    {
        return $this->nbPassager;
    }

    public function setNbPassager(int $nbPassager): self
    {
        $this->nbPassager = $nbPassager;

        return $this;
    }

    public function getAdresseDep(): ?string
    {
        return $this->adresseDep;
    }

    public function setAdresseDep(string $adresseDep): self
    {
        $this->adresseDep = $adresseDep;

        return $this;
    }

    public function getAdresseArr(): ?string
    {
        return $this->adresseArr;
    }

    public function setAdresseArr(string $adresseArr): self
    {
        $this->adresseArr = $adresseArr;

        return $this;
    }

    public function getHeureDep(): ?\DateTimeInterface
    {
        return $this->heureDep;
    }

    public function setHeureDep(\DateTimeInterface $heureDep): self
    {
        $this->heureDep = $heureDep;

        return $this;
    }

    public function getHeureArr(): ?\DateTimeInterface
    {
        return $this->heureArr;
    }

    public function setHeureArr(\DateTimeInterface $heureArr): self
    {
        $this->heureArr = $heureArr;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etatTransac;
    }

    public function setEtat(bool $etatTransac): self
    {
        $this->etatTransac = $etatTransac;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->idClient;
    }

    public function setClient(?Client $client): self
    {
        $this->idClient = $client;

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

    public function getChauffeur(): ?Chauffeur
    {
        return $this->idChauffeur;
    }

    public function setChauffeur(?Chauffeur $chauffeur): self
    {
        $this->idChauffeur = $chauffeur;

        return $this;
    }
}
