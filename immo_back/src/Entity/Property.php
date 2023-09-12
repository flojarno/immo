<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\PropertyRepository;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: PropertyRepository::class)]
#[ApiResource(
    operations: [
        new Post(normalizationContext: ['groups' => 'property:item']),
        new Get(normalizationContext: ['groups' => 'property:item']),
        new GetCollection(normalizationContext: ['groups' => 'property:list'])
    ]
)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['property:list', 'property:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $title = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['property:list', 'property:item'])]
    private ?PropertyType $property_type = null;   

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['property:list', 'property:item'])]
    private ?TranscationType $transaction_type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['property:list', 'property:item'])] // Ligne a virer ptet ?
    private ?User $user = null;


    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $summary = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER)]
    #[Groups(['property:list', 'property:item'])]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $additional_address = null;

    #[ORM\Column(length: 20)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $postal_code = null;

    #[ORM\Column(length: 50)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $place = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $longitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['property:list', 'property:item'])]
    private ?int $views = null;

    #[ORM\OneToMany(mappedBy: 'property', targetEntity: Photo::class, orphanRemoval: true, fetch: "EAGER")]
    #[ORM\JoinColumn(name: 'photos', referencedColumnName: 'property')]
    #[Groups(['property:list', 'property:item'])]
    private Collection $photos;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPropertyType(): ?PropertyType
    {
        return $this->property_type;
    }

    public function setPropertyType(?PropertyType $property_type): self
    {
        $this->property_type = $property_type;

        return $this;
    }

    public function getTransactionType(): ?TranscationType
    {
        return $this->transaction_type;
    }

    public function setTransactionType(?TranscationType $transaction_type): self
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additional_address;
    }

    public function setAdditionalAddress(?string $additional_address): self
    {
        $this->additional_address = $additional_address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setProperty($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getProperty() === $this) {
                $photo->setProperty(null);
            }
        }

        return $this;
    }



    public function __toString(){

        return 'Title : '.$this->getTitle();
    }


}
