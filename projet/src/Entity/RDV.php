<?php

namespace App\Entity;

use App\Repository\RDVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RDVRepository::class)
 */
class RDV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienVisio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horaire;

    /**
     * @ORM\ManyToOne(targetEntity=Conseiller::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Conseiller;

    /**
     * @ORM\ManyToOne(targetEntity=Touriste::class, inversedBy="rDVs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Touriste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLienVisio(): ?string
    {
        return $this->lienVisio;
    }

    public function setLienVisio(string $lienVisio): self
    {
        $this->lienVisio = $lienVisio;

        return $this;
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    public function setHoraire(\DateTimeInterface $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getConseiller(): ?Conseiller
    {
        return $this->Conseiller;
    }

    public function getConseillerID(): ?int
    {
        return $this->Conseiller->getID();
    }

    public function setConseiller(?Conseiller $Conseiller): self
    {
        $this->Conseiller = $Conseiller;

        return $this;
    }

    public function getTouriste(): ?Touriste
    {
        return $this->Touriste;
    }

    public function setTouriste(?Touriste $Touriste): self
    {
        $this->Touriste = $Touriste;

        return $this;
    }
}
