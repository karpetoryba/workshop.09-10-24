<?php

require_once('./controller/index.php');

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

} 