<?php

declare(strict_types=1);

namespace App;

use App\Interfaces\OfferInterface;
use App\Interfaces\DeliveryRuleInterface;

class Basket
{
    /**
     * @var string[] List of product codes added to the basket
     */

    private array $items = [];

    /**
     * @param OfferInterface[] $offers
     */

    public function __construct(
        private Catalog $catalog,
        private array $offers,
        private DeliveryRuleInterface $deliveryRule
    ) {
    }

    public function add(string $productCode): void
    {
        $this->items[] = $productCode;
    }

    public function total(): float
    {
        $products = array_map(fn ($code) => $this->catalog->getProduct($code), $this->items);

        $subtotal = array_reduce($products, fn ($sum, $p) => $sum + $p->price, 0);

        foreach ($this->offers as $offer) {
            $subtotal -= $offer->apply($products);
        }

        $deliveryCost = $this->deliveryRule->calculate($subtotal);

        return round($subtotal + $deliveryCost, 2);
    }
}
