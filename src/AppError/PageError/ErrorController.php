<?php

namespace App\AppError\PageError;

use App\Core\AbstractController;

class ErrorController extends AbstractController{


    public function errorPage(){

        $this->render("AppError/PageError","errorPage",[

        ]);
    }
}