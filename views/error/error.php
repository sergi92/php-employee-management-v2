<?php

class ErrorClass extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('error/index');
        echo "there has been an error";
    }
}
