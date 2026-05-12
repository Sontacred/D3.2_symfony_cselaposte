<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Salarie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_sal = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_sal = null;

    #[ORM\Column(length: 255)]
    private ?string $email_sal = null;

    #[ORM\ManyToOne(inversedBy: 'salaries')]
    #[ORM\JoinColumn(name: "site_sal_id", referencedColumnName: "id")]
    private ?Site $site = null;

    public function getNomSal(): ?string
    {
        return $this->nom_sal;
    }

    public function getPrenomSal(): ?string
    {
        return $this->prenom_sal;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }
}