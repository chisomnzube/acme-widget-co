<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Product;

interface CatalogInterface
{
    public function addProduct(Product $product): void;

    public function getProduct(string $code): ?Product;
}
