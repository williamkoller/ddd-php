<?php

namespace Domain\Factories;

use Domain\Entities\Order;

class OrderFactory {
    public static function create(string $id): Order {
        return new Order($id);
    }
}
