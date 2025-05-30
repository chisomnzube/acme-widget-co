# Acme Widget Basket

A simple shopping basket implementation for Acme Widget Co.  
This project showcases clean architecture principles using PHP 8.1+, with support for promotions, delivery rules, automated testing, and containerization.

---

## Requirements

- PHP 8.1+
- Composer
- Docker & Docker Compose (optional for isolated environments)

---

## Setup (Local Machine)

1. Clone the repository
   git clone https://github.com/chisomnzube/acme-widget-co.git
   cd acme-widget-co

2. Install dependencies using Composer
    composer install

## Docker (Recommended)

Run the app in a containerized environment using Docker:
   - docker-compose up --build -d
   - docker-compose exec app vendor/bin/phpunit
   - docker-compose exec app vendor/bin/phpstan analyse

## Running Tests
   vendor/bin/phpunit

Test coverage includes:
   * Product pricing
   * Basket subtotal/total
   * Delivery rule thresholds
   * Offers (e.g., Buy One Get Half Off)

## 🔍 Static Analysis (PHPStan)
   vendor/bin/phpstan analyse

## 🧠 Design Principles
This project demonstrates:

Dependency Injection
Classes do not create their own dependencies but receive them externally for better flexibility and testability.

Strategy Pattern
Offers and delivery rules are implemented as strategies that can be swapped without modifying the basket logic.

Interfaces and Abstraction
OfferInterface and DeliveryRuleInterface allow for extensible rules without coupling to concrete classes.

Typed Properties and Parameters
Strict typing ensures safety and better IDE support.

Separation of Concerns
Each class has a single responsibility — for example, Basket doesn’t know how an offer works.

## 📁 Project Structure

├── src/
│   ├── Basket.php
│   ├── Product.php
│   ├── Catalog.php
│   ├── Offers/
│   │   └── BuyOneGetHalfOff.php
│   ├── Delivery/
│   │   └── DeliveryCalculator.php
│   └── Interfaces/
│       ├── CatalogInterface.php
│       ├── OfferInterface.php
│       └── DeliveryRuleInterface.php
├── tests/
│   ├── BasketTest.php
├── composer.json
├── README.md
├── phpstan.neon
├── phpunit.xml
├── Dockerfile
├── docker-compose.yml
└── index.php

