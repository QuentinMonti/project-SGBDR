<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $filmId;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $rental_rate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rating;

    public function getFilmId(): ?int
    {
        return $this->filmId;
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

    public function getRentalRate(): ?string
    {
        return $this->rental_rate;
    }

    public function setRentalRate(string $rental_rate): self
    {
        $this->rental_rate = $rental_rate;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
