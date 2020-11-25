<?php
require_once '../../Autoloader.php';

$c = new Cart(1);

$service = new ProductBusinessService();

$prod1 = $service->findProductByID(1);
$prod2 = $service->findProductByID(98);
$prod3 = $service->findProductByID(42);

$c->addItem(98);
$c->addItem(15);
$c->addItem(42);
$c->addItem(42);
$c->addItem(42);
$c->addItem(42);
$c->calcTotal();
echo "<pre>";
print_r($c);
echo "</pre>";
$c->calcTotal();
$c->updateQty(42, 13);

echo "<pre>";
print_r($c);
echo "</pre>";

$c->updateQty(98, 0);
$c->calcTotal();
echo "<pre>";
print_r($c);
echo "</pre>";