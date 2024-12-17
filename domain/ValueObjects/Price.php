<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvalidPriceException;

class Price {
    private float $amount;

    public function __construct(float $amount) {
        if ($amount < 0) {
            throw new InvalidPriceException("Price cannot be negative.");
        }
        $this->amount = $amount;
    }

    public function add(Price $price): Price {
        return new Price($this->amount + $price->getAmount());
    }

    public function getAmount(): float {
        return $this->amount;
    }
}
