<?php
/**
 * Copyright (c) CodeEngine Academy by Markus Lech. This is a Projekt from CodeEngine Academy. All rights reserved.
 ******************************************************************************/

ini_set('display_errors', 1);

require __DIR__ . "/autoloader.php";


use App\Core\Container;
$container = new Container();

function getTimestamp(){

    date_default_timezone_set("Europe/Berlin");
    $timestamp = time();

    return $timestamp;
}

function getRequestURIElement(){
    $rqu = str_replace("/course/", "", $_SERVER['REQUEST_URI']);
    return $rqu;
}


function getRandomString($digits):string {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $digits; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


function html(string $str):string{

    $string = htmlentities($str, ENT_QUOTES, 'UTF-8');
    $string2 = str_replace('&lt;br /&gt;', '<br>', $string);

    return $string2;
}





//$test = $container->make("userRepository");
//var_dump($test->fetchAllByUSERID("1"));
