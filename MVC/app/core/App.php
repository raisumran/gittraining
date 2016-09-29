<?php
/**
 * This class parses URl and calls the respective controller and method
 */

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    /**
     * [parses URL and call respective controller and method]
     * @method __construct
     */

    public function __construct()
    {
        $url = $this -> parseUrl();
        if (file_exists('../app/controllers/'. $url[0]. '.php')) {
            $this -> controller = $url[0];
            unset($url[0]);
        }
        // spl_autoload_register( function ($classname) {
        //     include '../app/controllers/'.$this -> controller. '.php';
        // });
        // require_once '../app/controllers/'.$this -> controller. '.php';
        $this -> controller =  new $this -> controller;
        if (isset($url[1])) {
            if (method_exists($this -> controller, $url[1])) {
                $this -> method = $url[1];
                unset($url[1]);
            }
            $this -> params = $url ? array_values($url) : [];
        }
        call_user_func_array([$this -> controller, $this -> method], $this -> params);
    }
    /**
     * [returns the the contoller, method and params as an array]
     * @method parseUrl
     * @return [array]   [contains Controller name , method name and params]
     */

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
