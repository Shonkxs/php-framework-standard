<?php
/**
 * Copyright (c) CodeEngine Academy by Markus Lech. This is a Projekt from CodeEngine Academy. All rights reserved.
 ******************************************************************************/

session_start();
require __DIR__ . "/init.php";
$router = $container->build("router");

//unset($_SESSION['login']);
//setcookie("identifier", "", time() - (3600*24*365));
//setcookie("securitytoken", "", time() - (3600*24*365));

$request = $_SERVER["PATH_INFO"] ?? $_SERVER["REQUEST_URI"];

//$rqu = getRequestURIElement();

if (strtolower($request) == "/index") {
    $router->add("homeController", "home");
} elseif (strtolower($request) == "/wirpackenaus/") {
    $router->add("homeController", "home");
} elseif (strtolower($request) == "/") {
    $router->add("homeController", "home");
}

//Bereich für Ajax
//Webhooks
else {
    $router->add("errorController", "errorPage");
}
