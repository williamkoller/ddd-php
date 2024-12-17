<?php

namespace Domain\UseCases;

use Domain\Entities\Order;
use Domain\Repositories\OrderRepositoryInterface;

class CreateOrderUseCase {
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function execute(string $orderId): Order {
        $order = new Order($orderId);
        $this->orderRepository->save($order);
        return $order;
    }
}
