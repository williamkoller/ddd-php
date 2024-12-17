<?php

namespace Domain\Repositories;

use Domain\Entities\Order;

interface OrderRepositoryInterface {
    public function save(Order $order): void;
}
