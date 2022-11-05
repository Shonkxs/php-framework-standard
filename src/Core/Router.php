<?php

namespace App\Core;

class Router {

    public function __construct(Container $container){
        $this->container = $container;
    }

    public function add($ctrl, $methode){
        $container = $this->container->build($ctrl);
        $view = $methode;
        $this->build($container, $view);
    }

    public function build($container, $view){
        $container->$view();
    }
}