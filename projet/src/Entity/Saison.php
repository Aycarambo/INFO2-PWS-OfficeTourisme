<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $saison;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaison(): ?bool
    {
        return $this->saison;
    }

    public function setSaison(bool $saison): self
    {
        $this->saison = $saison;

        return $this;
    }
}
