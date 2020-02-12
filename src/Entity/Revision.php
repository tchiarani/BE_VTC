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
     * @ORM\Column(type="integer", name="IdRev")
     */
    private $IdRev;

    /**
     * @ORM\Column(type="date")
     */
    private $DateRev;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Avis;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbKmRev;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule", inversedBy="revisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Immat;

    public function getId(): ?int
    {
        return $this->IdRev;
    }

    public function getDateRev(): ?\DateTimeInterface
    {
        return $this->DateRev;
    }

    public function setDateRev(\DateTimeInterface $DateRev): self
    {
        $this->DateRev = $DateRev;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->Avis;
    }

    public function setAvis(string $Avis): self
    {
        $this->Avis = $Avis;

        return $this;
    }

    public function getNbKmRev(): ?int
    {
        return $this->NbKmRev;
    }

    public function setNbKmRev(int $NbKmRev): self
    {
        $this->NbKmRev = $NbKmRev;

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
}
