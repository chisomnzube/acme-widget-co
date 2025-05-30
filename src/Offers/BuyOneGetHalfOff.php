<?php

declare(strict_types=1);

namespace App\Offers;

use App\Product;
use App\Interfaces\OfferInterface;

class BuyOneGetHalfOff implements OfferInterface
{
    public function __construct(private string $productCode)
    {
    }

    public function apply(array $products): float
    {
        $filtered = array_values(array_filter($products, fn ($p) => $p->code === $this->productCode));
        $count = count($filtered);
        $discounts = intdiv($count, 2);

        if ($discounts === 0 || empty($filtered)) {
            return 0.0;
        }

        $discountValue = $filtered[0]->price / 2;

        // Debug:
        // echo "Discount count: $discounts, single discount value: $discountValue\n";

        // return $discounts * $discountValue;
        return round($discounts * ($filtered[0]->price / 2), 2);

    }
}
