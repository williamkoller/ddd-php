<?php

namespace Domain\Repositories;

use Domain\Entities\Product;

interface ProductRepositoryInterface {
    public function save(Product $product): void;
    public function findById(string $id): ?Product;
}
