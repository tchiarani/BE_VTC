<?php

namespace App\Entity;

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
}
