<?php
echo "<br>";
echo "Hello from the error page";
echo "<br>";
class ErrorClass extends Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->view->render('error/index');
        echo  "<p>There has been an error!<p/>";
    }
}
