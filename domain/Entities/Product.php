<?php


namespace Domain\Entities;

use Domain\ValueObjects\Price;

class Product
{
    private string $id;
    private string $name;
    private Price $price;

    public function __construct(string $id, string $name, Price $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
