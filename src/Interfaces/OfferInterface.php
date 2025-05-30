<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Product;

interface OfferInterface
{
    /**
     * Applies the offer to the basket.
     *
     * @param Product[] $products
     * @return float The discount amount to subtract from the total.
     */
    public function apply(array $products): float;
}
