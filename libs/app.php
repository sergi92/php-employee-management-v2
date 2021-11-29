<?php
// require_once 'controllers/error.php';

class App
{
    function __construct()
    {
        // var_dump($_GET['url']);
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // $this->load($url);
        $controllerFile = 'controllers/' . $url[0] . '.php';
        echo "controller file" . $controllerFile;
        // $cleanUrl = substr($url[1], 0, -4);
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $url[0]();
            if (isset($url[1])) {
                $controller->{$url[2]}();
            }
        } else {
            $controller = new Error();
        }
    }
}
