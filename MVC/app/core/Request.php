<?php
/**
 *
 */
class Request
{

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
        $app = new App($controller, $method, $params);
        $app -> controllerCall();
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
