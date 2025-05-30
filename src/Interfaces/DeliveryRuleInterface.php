<?php

declare(strict_types=1);

namespace App\Interfaces;

interface DeliveryRuleInterface
{
    public function calculate(float $subtotal): float;
}
