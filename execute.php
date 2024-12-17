<?php

require_once __DIR__ . '/vendor/autoload.php';

use Domain\Repositories\Implementation\OrderRepository;
use Domain\UseCases\CreateOrderUseCase;

$orderRepository = new OrderRepository();
$createOrderUseCase = new CreateOrderUseCase($orderRepository);

$order = $createOrderUseCase->execute('1234');

echo "Ordem criada com ID: {$order->getId()}\n";
