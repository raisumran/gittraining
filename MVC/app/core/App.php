<?php
/**
 * This class parses URl and calls the respective controller and method
 */

class App
{
    protected $controller;
    protected $method ;
    protected $params ;
    /**
     * [parses URL and call respective controller and method]
     * @method __construct
     */

    public function __construct($contoller, $index, $params)
    {
        $this -> controller = $contoller;
        $this -> method = $index;
        $this -> params = $params;
    }
    public function controllerCall() {
        $cFactory =  new ControllerFactory();
        $cHandle = $cFactory ->  createController($this -> controller);
        $method =  $this ->  method;
        $cHandle -> $method();
    }

}
