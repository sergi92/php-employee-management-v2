<?php
class Main extends Controller
{
    function __construct()
    {
        parent::__construct();

        require_once 'libs/app.php';
        echo "Hello, I'm the main controller!";
        // $app=new App();
    }
    function greeting()
    {
        echo "Hello, greetings from Main!";
    }
}
