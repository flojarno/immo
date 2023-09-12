<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhotoRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'property:item']),
        new Get(normalizationContext: ['groups' => 'property:list']),
    ]
)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['property:item', 'property:list'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['property:item', 'property:list'])]
    private ?string $file = null;

    #[ORM\Column(length: 255)]
    #[Groups(['property:item', 'property:list'])]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['property:item', 'property:list'])]
    private ?Property $property = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function __toString(){

        return 'Title : '.$this->getTitle();
    }
}
