<?php
class Controller
{
    function __construct()
    {
        echo "Hello, I'm the controller!";
        $this->view = new View();
    }
}
