<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass= "App\Repository\UserRepository")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo_user", type="string", length=255, nullable=false)
     */
    private $pseudoUser;

    /**
     * @var string
     *
     * @ORM\Column(name="email_user", type="string", length=255, nullable=false)
     */
    private $emailUser;

    /**
     * @var string
     *
     * @ORM\Column(name="name_user", type="string", length=255, nullable=false)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_user", type="string", length=255, nullable=false)
     */
    private $firstnameUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate_user", type="date", nullable=false)
     */
    private $birthdateUser;

    /**
     * @var float
     *
     * @ORM\Column(name="distance_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $distanceUser;

    /**
     * @var string
     *
     * @ORM\Column(name="url_img_user", type="string", length=255, nullable=false)
     */
    private $urlImgUser;

    /**
     * @var float
     *
     * @ORM\Column(name="posX_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $posxUser;

    /**
     * @var float
     *
     * @ORM\Column(name="posY_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $posyUser;

    /**
     * @var string
     *
     * @ORM\Column(name="password_user", type="string", length=255, nullable=false)
     */
    private $passwordUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date_user", type="date", nullable=false)
     */
    private $registerDateUser;

    /**
     * @var int
     *
     * @ORM\Column(name="rating_user", type="integer", nullable=false)
     */
    private $ratingUser;

    /**
     * @var string
     *
     * @ORM\Column(name="role_user", type="string", length=20, nullable=false)
     */
    private $roleUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="idUser")
     */
    private $idType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idType = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getPseudoUser(): ?string
    {
        return $this->pseudoUser;
    }

    public function setPseudoUser(string $pseudoUser): self
    {
        $this->pseudoUser = $pseudoUser;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->emailUser;
    }

    public function setEmailUser(string $emailUser): self
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getFirstnameUser(): ?string
    {
        return $this->firstnameUser;
    }

    public function setFirstnameUser(string $firstnameUser): self
    {
        $this->firstnameUser = $firstnameUser;

        return $this;
    }

    public function getBirthdateUser(): ?\DateTimeInterface
    {
        return $this->birthdateUser;
    }

    public function setBirthdateUser(\DateTimeInterface $birthdateUser): self
    {
        $this->birthdateUser = $birthdateUser;

        return $this;
    }

    public function getDistanceUser(): ?float
    {
        return $this->distanceUser;
    }

    public function setDistanceUser(float $distanceUser): self
    {
        $this->distanceUser = $distanceUser;

        return $this;
    }

    public function getUrlImgUser(): ?string
    {
        return $this->urlImgUser;
    }

    public function setUrlImgUser(string $urlImgUser): self
    {
        $this->urlImgUser = $urlImgUser;

        return $this;
    }

    public function getPosxUser(): ?float
    {
        return $this->posxUser;
    }

    public function setPosxUser(float $posxUser): self
    {
        $this->posxUser = $posxUser;

        return $this;
    }

    public function getPosyUser(): ?float
    {
        return $this->posyUser;
    }

    public function setPosyUser(float $posyUser): self
    {
        $this->posyUser = $posyUser;

        return $this;
    }

    public function getPasswordUser(): ?string
    {
        return $this->passwordUser;
    }

    public function setPasswordUser(string $passwordUser): self
    {
        $this->passwordUser = $passwordUser;

        return $this;
    }

    public function getRegisterDateUser(): ?\DateTimeInterface
    {
        return $this->registerDateUser;
    }

    public function setRegisterDateUser(\DateTimeInterface $registerDateUser): self
    {
        $this->registerDateUser = $registerDateUser;

        return $this;
    }

    public function getRatingUser(): ?int
    {
        return $this->ratingUser;
    }

    public function setRatingUser(int $ratingUser): self
    {
        $this->ratingUser = $ratingUser;

        return $this;
    }

    public function getRoleUser(): ?string
    {
        return $this->roleUser;
    }

    public function setRoleUser(string $roleUser): self
    {
        $this->roleUser = $roleUser;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getIdType(): Collection
    {
        return $this->idType;
    }

    public function addIdType(Category $idType): self
    {
        if (!$this->idType->contains($idType)) {
            $this->idType[] = $idType;
            $idType->addIdUser($this);
        }

        return $this;
    }

    public function removeIdType(Category $idType): self
    {
        if ($this->idType->removeElement($idType)) {
            $idType->removeIdUser($this);
        }

        return $this;
    }

    public function getRoles(): array
    {
        $roles=[$this->roleUser];

        return array_unique($roles);
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->emailUser;
    }

    public function getPassword(): ?string
    {
       return $this->passwordUser;
    }
}
