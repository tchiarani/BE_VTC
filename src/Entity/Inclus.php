<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InclusRepository")
 */
class Inclus
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis", inversedBy="incluses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Permis;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis", inversedBy="incluses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PermisInclus;

    public function getPermis(): ?Permis
    {
        return $this->Permis;
    }

    public function setPermis(?Permis $Permis): self
    {
        $this->Permis = $Permis;

        return $this;
    }
    public function getPermisInclus(): ?Permis
    {
        return $this->PermisInclus;
    }

    public function setPermisInclus(?Permis $PermisInclus): self
    {
        $this->PermisInclus = $PermisInclus;

        return $this;
    }
}
