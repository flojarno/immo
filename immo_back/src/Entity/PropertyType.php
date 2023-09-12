<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\PropertyTypeRepository;
use Doctrine\Common\Collections\Collection;

use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PropertyTypeRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'propertytype:item']),
        new Get(normalizationContext: ['groups' => 'property:item']),
        new Get(normalizationContext: ['groups' => 'propert:list']),
        new GetCollection(normalizationContext: ['groups' => 'propertytype:list'])
    ]
)]
class PropertyType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['propertytype:list', 'propertytype:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['propertytype:list', 'propertytype:item', 'property:list', 'property:item'])]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'property_type', targetEntity: Property::class)]
    private Collection $properties;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

  
    /**
     * @return Collection<int, Property>
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
            $property->setPropertyType($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getPropertyType() === $this) {
                $property->setPropertyType(null);
            }
        }

        return $this;
    }

    public function __toString(){

        return 'Type : '.$this->getType();
    }
}
