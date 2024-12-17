<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvalidDiscountException;

class Discount {
    private float $percentage;

    public function __construct(float $percentage) {
        if ($percentage < 0 || $percentage > 100) {
            throw new InvalidDiscountException("Discount percentage must be between 0 and 100.");
        }
        $this->percentage = $percentage;
    }

    public function getPercentage(): float {
        return $this->percentage;
    }
}
