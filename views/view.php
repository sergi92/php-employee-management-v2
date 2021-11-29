<?php
class View
{
    function __construct()
    {
        echo 'This is the base view';
    }
    function render($name)
    {
        require 'views/' . $name . '.php';
    }
}
