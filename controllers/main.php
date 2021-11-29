<?php
class Main extends Controller
{
    function __construct()
    {
        parent::__construct();

        require_once 'libs/app.php';
        echo "<br>";
        echo "Hello, I'm the main controller!";
        // $app=new App();
    }
    function greeting()
    {
        echo "<br>";
        echo "Hello, greetings from Main!";
    }
}
