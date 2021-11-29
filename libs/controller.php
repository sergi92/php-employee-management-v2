<?php
class Controller
{
    function __construct()
    {
        echo "<br>";
        echo "Hello, I'm the controller!";
        echo "<br>";
        $this->view = new View();
    }
}
