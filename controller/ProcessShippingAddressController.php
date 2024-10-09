<?php

require_once '../model/Order.php'; 

session_start();

if (!isset($_SESSION['order'])) {
    require_once '../view/404.php';
    return;
}

try {
    $order = $_SESSION['order'];

    if (!isset($_POST['shippingCountry']) || 
        !isset($_POST['shippingCity']) || 
        !isset($_POST['shippingAddress'])
    ) {
		$errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
		
		require_once '../view/order-error.php';
		return;
	}

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

