<?php

namespace Domain\Entities;

use Domain\ValueObjects\Price;

class Order {
    private string $id;
    private array $products = [];
    private Price $totalPrice;

    public function __construct(string $id) {
        $this->id = $id;
        $this->totalPrice = new Price(0);
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
        $this->totalPrice = $this->totalPrice->add($product->getPrice());
    }

    public function getProducts(): array {
        return $this->products;
    }

    public function getTotalPrice(): Price {
        return $this->totalPrice;
    }

    public function getId(): string {
        return $this->id;
    }
}
