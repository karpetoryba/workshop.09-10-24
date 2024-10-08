<?php

require_once '../model/Order.php'; 

session_start();

if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
	$order->setShippingAddress('test', 'test', 'France');
	
} else {
    echo "Aucune commande en cours.";
}