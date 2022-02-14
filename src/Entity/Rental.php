<?php

namespace App\Entity;

use App\Repository\RentalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RentalRepository::class)
 */
class Rental
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $rental_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $inventory_id;

    public function getRentalId(): ?int
    {
        return $this->rental_id;
    }

    public function getInventoryId(): ?int
    {
        return $this->inventory_id;
    }

    public function setInventoryId(int $inventory_id): self
    {
        $this->inventory_id = $inventory_id;

        return $this;
    }
}
