<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advice
 *
 * @ORM\Table(name="advice", indexes={@ORM\Index(name="ADVICE_USER_FK", columns={"id_user"}), @ORM\Index(name="ADVICE_OFFER0_FK", columns={"id_offer"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AdviceRepository")

 */
class Advice
{
    /**
     * @var int
     *
     * @ORM\Column(name="advice_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adviceId;

    /**
     * @var bool
     *
     * @ORM\Column(name="rating", type="boolean", nullable=false)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="advice_date", type="date", nullable=false)
     */
    private $adviceDate;

    /**
     * @var \Offer
     *
     * @ORM\ManyToOne(targetEntity="Offer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offer", referencedColumnName="id_offer")
     * })
     */
    private $idOffer;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getAdviceId(): ?int
    {
        return $this->adviceId;
    }

    public function getRating(): ?bool
    {
        return $this->rating;
    }

    public function setRating(bool $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAdviceDate(): ?\DateTimeInterface
    {
        return $this->adviceDate;
    }

    public function setAdviceDate(\DateTimeInterface $adviceDate): self
    {
        $this->adviceDate = $adviceDate;

        return $this;
    }

    public function getIdOffer(): ?Offer
    {
        return $this->idOffer;
    }

    public function setIdOffer(?Offer $idOffer): self
    {
        $this->idOffer = $idOffer;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
