<?php
/**
 * Copyright (c) CodeEngine Academy by Markus Lech. This is a Projekt from CodeEngine Academy. All rights reserved.
 ******************************************************************************/

namespace App\Core;
use App\AppError\PageError\ErrorController;
use App\AppFrontPages\Home\HomeController;
use PDO;

class Container
{
    private $instance = [];
    private $buildguide = [];

    public function __construct()
    {
        $this->buildguide = [
            //Builds for Controllers, Router and Container
            "router" => function () {
                return new Router($this->build("container"));
            },
            "container" => function () {
                return new Container();
            },
            "errorController" => function () {
                return new ErrorController();
            },
            "homeController" => function () {
                return new HomeController();
            },
        ];
    }

    public function build($name)
    {
        if (!empty($this->instance[$name])) {
            return $this->instance[$name];
        }

        if (isset($this->buildguide[$name])) {
            $this->instance[$name] = $this->buildguide[$name]();
        }
        return $this->instance[$name];
    }
}
