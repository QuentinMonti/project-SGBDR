<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryRepository::class)
 */
class Inventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $inventory_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $film_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $store_id;

    public function getInventoryId(): ?int
    {
        return $this->inventory_id;
    }

    public function getFilmId(): ?int
    {
        return $this->film_id;
    }

    public function setFilmId(int $film_id): self
    {
        $this->film_id = $film_id;

        return $this;
    }

    public function getStoreId(): ?int
    {
        return $this->store_id;
    }

    public function setStoreId(int $store_id): self
    {
        $this->store_id = $store_id;

        return $this;
    }
}
