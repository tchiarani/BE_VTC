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
    private $permis;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Permis", inversedBy="incluses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $permisInclus;

    public function getPermis(): ?Permis
    {
        return $this->permis;
    }

    public function setPermis(?Permis $permis): self
    {
        $this->Permis = $permis;

        return $this;
    }
    public function getPermisInclus(): ?Permis
    {
        return $this->permisInclus;
    }

    public function setPermisInclus(?Permis $permisInclus): self
    {
        $this->permisInclus = $permisInclus;

        return $this;
    }
}
