<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\TranscationTypeRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TranscationTypeRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'transactiontype:item']),
        new Get(normalizationContext: ['groups' => 'property:item']),
        new Get(normalizationContext: ['groups' => 'property:list']),
        new GetCollection(normalizationContext: ['groups' => 'transactiontype:list'])
    ]
)]
class TranscationType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['transactiontype:list', 'transactiontype:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['transactiontype:list', 'transactiontype:item', 'property:list', 'property:item'])]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'transaction_type', targetEntity: Property::class)]
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
            $property->setTransactionType($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getTransactionType() === $this) {
                $property->setTransactionType(null);
            }
        }

        return $this;
    }

    public function __toString(){

        return 'Type : '.$this->getType();
    }
}
