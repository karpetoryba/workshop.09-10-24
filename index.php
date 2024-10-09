<?php

require_once('./controller/IndexController.php');
require_once('./controller/CreateOrderController.php');
require_once('./controller/ProcessPaymentController.php');
require_once('./controller/ProcessShippingAddressController.php');
require_once('./controller/ProcessShippingMethodController.php');
require_once('./controller/PayController.php');
require_once('./controller/SetShippingAddressController.php');
require_once('./controller/SetShippingMethodController.php');

// Récupère l'url actuelle et supprime le chemin de base
// c'est à dire : http://localhost:8888/esd-oop-php/public/
// donc cela ne garde que la fin de l'url

$requestUri = $_SERVER['REQUEST_URI'];
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/esd-oop-php/', '', $uri);
$endUri = trim($endUri, '/');


if($endUri === "") {
    $indexController = new IndexController();
    $indexController->index();
    return;
} 

if($endUri === "create-order") {
    $createOrderController = new CreateOrderController();
    $createOrderController->createOrder();
    return;
} 
if($endUri === "process-payment") {
    $ProcessPaymentController = new ProcessPaymentController();
    $ProcessPaymentController ->ProcessPayment();
    return;
} 
if($endUri === "process-shipping-address") {
    $ProcessShippingAddressController = new ProcessShippingAddressController();
    $ProcessShippingAddressController->ProcessShippingAddressController();
    return;
} 
if($endUri === "process-shipping-method") {
    $ProcessShippingMethodController = new ProcessShippingMethodController();
    $ProcessShippingMethodController->ProcessShippingMethodController();
    return;
} 
if($endUri === "pay") {
    $PayController = new PayControllerController();
    $PayController->PayController();
    return;
} 
if($endUri === "set-shipping-address") {
    $SetShippingAddressController = new SetShippingAddressController();
    $SetShippingAddressController->SetShippingAddressController();
    return;
} 
if($endUri === "set-shipping-method") {
    $SetShippingMethodController = new SetShippingMethodController();
    $SetShippingMethodController->SetShippingMethodController();
    return;
} 