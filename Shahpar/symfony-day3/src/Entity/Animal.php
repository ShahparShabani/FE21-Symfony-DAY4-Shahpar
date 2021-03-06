<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $breed;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $create_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $adopted;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     */
    public $fk_status;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $fk_adoption_id;

    public function __construct()
    {
        $this->fk_adoption_id = new ArrayCollection();
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAdopted(): ?bool
    {
        return $this->adopted;
    }

    public function setAdopted(bool $adopted): self
    {
        $this->adopted = $adopted;

        return $this;
    }

    public function getFkStatus(): ?Status
    {
        return $this->fk_status;
    }

    public function setFkStatus(?Status $fk_status): self
    {
        $this->fk_status = $fk_status;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFkAdoptionId(): Collection
    {
        return $this->fk_adoption_id;
    }

    public function addFkAdoptionId(User $fkAdoptionId): self
    {
        if (!$this->fk_adoption_id->contains($fkAdoptionId)) {
            $this->fk_adoption_id[] = $fkAdoptionId;
        }

        return $this;
    }

    public function removeFkAdoptionId(User $fkAdoptionId): self
    {
        $this->fk_adoption_id->removeElement($fkAdoptionId);

        return $this;
    }
}
