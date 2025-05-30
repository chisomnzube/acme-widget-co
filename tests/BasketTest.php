<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Product;
use App\Catalog;
use App\Basket;
use App\Offers\BuyOneGetHalfOff;
use App\Delivery\DeliveryCalculator;

final class BasketTest extends TestCase
{
    private Basket $basket;

    protected function setUp(): void
    {
        $catalog = new Catalog();
        $catalog->addProduct(new Product('R01', 'Red Widget', 32.95));
        $catalog->addProduct(new Product('G01', 'Green Widget', 24.95));
        $catalog->addProduct(new Product('B01', 'Blue Widget', 7.95));

        $this->basket = new Basket(
            $catalog,
            [new BuyOneGetHalfOff('R01')],
            new DeliveryCalculator()
        );
    }

    //test for B01, G01
    public function testBasketWithTwoProducts(): void
    {
        $this->basket->add('B01');
        $this->basket->add('G01');
        $total = $this->basket->total();
        $this->assertEqualsWithDelta(37.85, $total, 0.01);
    }

    //test for R01, R01
    public function testBOBOOffer(): void
    {
        $this->basket->add('R01');
        $this->basket->add('R01');
        $total = $this->basket->total();
        $this->assertEqualsWithDelta(54.37, $total, 0.01);
    }

    //test for R01, G01
    public function testROGOOffer(): void
    {
        $this->basket->add('R01');
        $this->basket->add('G01');
        $total = $this->basket->total();
        $this->assertEqualsWithDelta(60.85, $total, 0.01);
    }


    //test for B01, B01, R01, R01, R01
    public function testBOBOROROROOffer(): void
    {
        $this->basket->add('B01');
        $this->basket->add('B01');
        $this->basket->add('R01');
        $this->basket->add('R01');
        $this->basket->add('R01');
        $total = $this->basket->total();
        $this->assertEqualsWithDelta(98.27, $total, 0.01);
    }
}
