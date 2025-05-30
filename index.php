<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Product;
use App\Catalog;
use App\Basket;
use App\Offers\BuyOneGetHalfOff;
use App\Delivery\DeliveryCalculator;

$catalog = new Catalog();
$catalog->addProduct(new Product('R01', 'Red Widget', 32.95));
$catalog->addProduct(new Product('G01', 'Green Widget', 24.95));
$catalog->addProduct(new Product('B01', 'Blue Widget', 7.95));

$basket = new Basket(
    $catalog,
    [new BuyOneGetHalfOff('R01')],
    new DeliveryCalculator()
);

// You can change this to test any combination:
$items = ['B01', 'B01', 'R01', 'R01', 'R01'];

foreach ($items as $code) {
    $basket->add($code);
}

echo "Total: $" . number_format($basket->total(), 2) . PHP_EOL;
