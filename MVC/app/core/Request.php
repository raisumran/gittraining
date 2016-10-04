<?php
/**
 *
 */
class Request
{
    private static $_instance = null;
    public $controller;
    public $method;
    public $params;

    public static function getInstance() {
        if (Request::$_instance == null) {
            Request::$_instance = new Request();
        }
        return Request::$_instance;
    }
    function __construct()
    {
        $controller = 'home';
        $method =  'index';
        $params = [];
        $url = $this -> parseUrl();
        if (file_exists('../app/controllers/'. $url[0]. '.php')) {
            $controller = $url[0];
            unset($url[0]);
        }
        if (isset($url[1])) {
            if (method_exists($controller, $url[1])) {
                $method = $url[1];
                unset($url[1]);
            }
            $params = $url ? array_values($url) : [];
        }
        echo $method;
        $this -> controller = $controller;
        $this -> method =  $method;
        $this -> params =  $params;
        if($_POST) {
            $this -> params =  $_POST["param"];
        }
    }
    /**
     * [returns the the contoller, method and params as an array]
     * @method parseUrl
     * @return [array]   [contains Controller name , method name and params]
     */

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
