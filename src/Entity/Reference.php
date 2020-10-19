<?php


namespace App\Entity;


use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Reference
 * @package App\Entity
 * @ORM\Entity
 */
class Reference
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    private ?string $title = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    private ?string $company = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable")
     */
    private ?DateTimeInterface $startedAt = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private ?DateTimeInterface $endedAt = null;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media", mappedBy="reference", cascade={"persist"}, orphanRemoval=true)
     */
    private Collection $medias;

    /**
     * @return Collection
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    /**
     * Reference constructor.
     */
    public function __construct( )
    {
        $this->medias = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartedAt(): ?DateTimeInterface
    {
        return $this->startedAt;
    }

    /**
     * @param DateTimeInterface|null $startedAt
     */
    public function setStartedAt(?DateTimeInterface $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEndedAt(): ?DateTimeInterface
    {
        return $this->endedAt;
    }

    /**
     * @param DateTimeInterface|null $endedAt
     */
    public function setEndedAt(?DateTimeInterface $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    /**
     * @param Media $media
     */
    public function addMedia (Media $media) : void
    {
        if (!$this->medias->contains($media)){
            $media->setReference($this);
            $this->medias->add($media);
        }
    }


    /**
     * @param Media $media
     */
    public function removeMedia (Media $media) : void
    {
        if ($this->medias->contains($media)){
            $media->setReference(null);
            $this->medias->removeElement($media);
        }
    }



}