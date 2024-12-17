<?php

namespace Domain\Repositories\Implementation;

use Domain\Entities\Order;
use Domain\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {
    public function save(Order $order): void {
        echo "Ordem com ID: {$order->getId()} salva.\n";
    }
}
