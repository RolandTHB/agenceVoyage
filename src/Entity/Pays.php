<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaysRepository")
 */
class Pays
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $population;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Destination", mappedBy="pays")
     */
    private $destinations;

    public function __construct()
    {
        $this->destinations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|destination[]
     */
    public function getDestinations(): Collection
    {
        return $this->destinations;
    }

    public function addDestination(destination $destination): self
    {
        if (!$this->destinations->contains($destination)) {
            $this->destinations[] = $destination;
            $destination->setPays($this);
        }

        return $this;
    }

    public function removeDestination(destination $destination): self
    {
        if ($this->destinations->contains($destination)) {
            $this->destinations->removeElement($destination);
            // set the owning side to null (unless already changed)
            if ($destination->getPays() === $this) {
                $destination->setPays(null);
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population): void
    {
        $this->population = $population;
    }


}
