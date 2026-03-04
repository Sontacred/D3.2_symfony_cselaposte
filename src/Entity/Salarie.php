<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalarieRepository::class)]
class Salarie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSal = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomSal = null;

    #[ORM\Column(length: 255)]
    private ?string $mdpSal = null;

    #[ORM\Column(length: 255)]
    private ?string $emailSal = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Site $siteSal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSal(): ?string
    {
        return $this->nomSal;
    }

    public function setNomSal(string $nomSal): static
    {
        $this->nomSal = $nomSal;

        return $this;
    }

    public function getPrenomSal(): ?string
    {
        return $this->prenomSal;
    }

    public function setPrenomSal(string $prenomSal): static
    {
        $this->prenomSal = $prenomSal;

        return $this;
    }

    public function getMdpSal(): ?string
    {
        return $this->mdpSal;
    }

    public function setMdpSal(string $mdpSal): static
    {
        $this->mdpSal = $mdpSal;

        return $this;
    }

    public function getEmailSal(): ?string
    {
        return $this->emailSal;
    }

    public function setEmailSal(string $emailSal): static
    {
        $this->emailSal = $emailSal;

        return $this;
    }

    public function getSiteSal(): ?Site
    {
        return $this->siteSal;
    }

    public function setSiteSal(?Site $siteSal): static
    {
        $this->siteSal = $siteSal;

        return $this;
    }
}
