<?php

namespace App\AppFrontPages\Home;

use App\Core\AbstractController;

class HomeController extends AbstractController
{

    public function home()
    {

        $this->render("AppFrontPages/Home", "home", []);
    }
}
