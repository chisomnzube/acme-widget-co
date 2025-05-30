<?php

declare(strict_types=1);

namespace App;

class Product {
    public function __construct(
        public string $code,
        public string $name,
        public float $price
    ) {}
}
