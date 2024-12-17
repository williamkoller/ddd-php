<?php

namespace Domain\Services;

use Domain\Entities\Order;
use Domain\ValueObjects\Discount;
use Domain\ValueObjects\Price;

class OrderDiscountService {
    public function applyDiscount(Order $order, Discount $discount): Price {
        $total = $order->getTotalPrice()->getAmount();
        $discountAmount = $total * ($discount->getPercentage() / 100);
        return new Price($total - $discountAmount);
    }
}
