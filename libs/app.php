<?php
// require '../controllers/error.php';

class App
{
    function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        var_dump($url);

        $controllerFile = 'controllers/' . $url[0] . '.php';

        echo "controller file: " . $controllerFile;

        if (file_exists($controllerFile)) {
            echo "controller file " . $controllerFile;
            require_once $controllerFile;
            $controller = new $url[0];
            if (isset($url[1])) {
                echo "<pre>";
                $controller->{$url[1]}();
            }
        } else {
            require_once 'controllers/error.php';
            $controller = new ErrorClass();
            print_r($controller);
        }
    }
}
