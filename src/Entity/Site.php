<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRepository::class)]
class Site
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSite = null;

    /**
     * @var Collection<int, Salarie>
     */
    #[ORM\OneToMany(targetEntity: Salarie::class, mappedBy: 'siteSal')]
    private Collection $salaries;

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSite(): ?string
    {
        return $this->nomSite;
    }

    public function setNomSite(string $nomSite): static
    {
        $this->nomSite = $nomSite;

        return $this;
    }

    /**
     * @return Collection<int, Salarie>
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalary(Salarie $salary): static
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries->add($salary);
            $salary->setSiteSal($this);
        }

        return $this;
    }

    public function removeSalary(Salarie $salary): static
    {
        if ($this->salaries->removeElement($salary)) {
            // set the owning side to null (unless already changed)
            if ($salary->getSiteSal() === $this) {
                $salary->setSiteSal(null);
            }
        }

        return $this;
    }
}
