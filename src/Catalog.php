<?php

declare(strict_types=1);

namespace App;

use App\Interfaces\CatalogInterface;

class Catalog implements CatalogInterface {
    /** @var Product[] */
    private array $products = [];

    public function addProduct(Product $product): void {
        $this->products[$product->code] = $product;
    }

    public function getProduct(string $code): ?Product {
        return $this->products[$code] ?? null;
    }
}
