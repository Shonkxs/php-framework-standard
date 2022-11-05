<?php
/**
 * Copyright (c) CodeEngine Academy by Markus Lech. This is a Projekt from CodeEngine Academy. All rights reserved.
 ******************************************************************************/


namespace App\Core;

abstract class AbstractController {

    public function User(){

        if (!empty($_SESSION['username'])){
            return $_SESSION['username'];
        } elseif (empty($_SESSION['username'])){
            return null;
        }
    }

    protected function render($namespace, $view, $parameter){

        extract($parameter);
        require_once __DIR__ . "/../$namespace/Views/$view.php";
    }


}