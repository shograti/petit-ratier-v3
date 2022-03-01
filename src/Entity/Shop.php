<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
 * @ORM\Entity(repositoryClass= "App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("offer:read")
     */
    private $idShop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="posX_shop", type="decimal", precision=10, scale=8, nullable=true, options={"default"="NULL"})
     * @Groups("offer:read")
     */
    private $posxShop = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="posY_shop", type="decimal", precision=11, scale=8, nullable=true, options={"default"="NULL"})
     * @Groups("offer:read")
     */
    private $posyShop = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="osm_id", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $osmId = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $type = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $brand = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="operator", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $operator = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="wheelchair", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $wheelchair = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="opening_hours", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $openingHours = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="level", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $level = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="siret", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $siret = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="wikidata", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $wikidata = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $website = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $phone = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $email = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $facebook = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="com_insee", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $comInsee = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_nom", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $comNom = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_caresteouvert", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $urlCaresteouvert = 'NULL';

    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    public function getPosxShop(): ?string
    {
        return $this->posxShop;
    }

    public function setPosxShop(?string $posxShop): self
    {
        $this->posxShop = $posxShop;

        return $this;
    }

    public function getPosyShop(): ?string
    {
        return $this->posyShop;
    }

    public function setPosyShop(?string $posyShop): self
    {
        $this->posyShop = $posyShop;

        return $this;
    }

    public function getOsmId(): ?string
    {
        return $this->osmId;
    }

    public function setOsmId(?string $osmId): self
    {
        $this->osmId = $osmId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getOperator(): ?string
    {
        return $this->operator;
    }

    public function setOperator(?string $operator): self
    {
        $this->operator = $operator;

        return $this;
    }

    public function getWheelchair(): ?string
    {
        return $this->wheelchair;
    }

    public function setWheelchair(?string $wheelchair): self
    {
        $this->wheelchair = $wheelchair;

        return $this;
    }

    public function getOpeningHours(): ?string
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?string $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getWikidata(): ?string
    {
        return $this->wikidata;
    }

    public function setWikidata(?string $wikidata): self
    {
        $this->wikidata = $wikidata;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getComInsee(): ?int
    {
        return $this->comInsee;
    }

    public function setComInsee(?int $comInsee): self
    {
        $this->comInsee = $comInsee;

        return $this;
    }

    public function getComNom(): ?string
    {
        return $this->comNom;
    }

    public function setComNom(?string $comNom): self
    {
        $this->comNom = $comNom;

        return $this;
    }

    public function getUrlCaresteouvert(): ?string
    {
        return $this->urlCaresteouvert;
    }

    public function setUrlCaresteouvert(?string $urlCaresteouvert): self
    {
        $this->urlCaresteouvert = $urlCaresteouvert;

        return $this;
    }


}
