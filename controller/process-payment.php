<?php

require_once '../model/Order.php'; 

session_start();

if (!isset($_SESSION['order'])) {
    require_once '../view/404.php';
    return;
}


try {
	$order = $_SESSION['order'];
	$order->pay();
	
	$_SESSION['order'] = $order;
	
	require_once '../view/paid.php';
} catch (Exception $e) {
	$errorMessage = $e->getMessage();
	require_once '../view/order-error.php';
}
