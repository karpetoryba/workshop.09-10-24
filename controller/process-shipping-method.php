<?php

require_once '../model/Order.php'; 

session_start();

if (!isset($_SESSION['order'])) {
    require_once '../view/404.php';
    return;
}

try {
    $order = $_SESSION['order'];

    if (!isset($_POST['shippingMethod'])) {
		$errorMessage = "Merci de remplir les champs. J'ai pas fait tout ça pour rien.";
		
		require_once '../view/order-error.php';
		return;
	}

    $shippingMethod = $_POST['shippingMethod'];
  
    $order->setShippingMethod($shippingMethod);

    $_SESSION['order'] = $order;

    require_once '../view/shipping-method-added.php';

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require_once '../view/order-error.php';
}



