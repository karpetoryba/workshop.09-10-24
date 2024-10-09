<?php

require_once '../model/Order.php'; 

session_start();

if (isset($_SESSION['order'])) {

    try {
        $order = $_SESSION['order'];

        $shippingCountry = $_POST['shippingCountry'];
        $shippingCity = $_POST['shippingCity'];
        $shippingAddress = $_POST['shippingAddress'];

        $order->setShippingAddress($shippingAddress, $shippingCity, $shippingCountry);

        $_SESSION['order'] = $order;

        require_once '../view/shipping-address-added.php';

    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        require_once '../view/order-error.php';
    }

} else {
	require_once '../view/404.php';
}