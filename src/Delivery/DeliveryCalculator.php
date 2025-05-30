<?php

declare(strict_types=1);

namespace App\Delivery;

use App\Interfaces\DeliveryRuleInterface;

class DeliveryCalculator implements DeliveryRuleInterface {
    public function calculate(float $subtotal): float {
        return $subtotal < 50 ? 4.95 : ($subtotal < 90 ? 2.95 : 0.00);
    }
}
