<?php
/**
 * constructs controllers
 */
class ControllerFactory
{
    private $controller;
    /**
     * [constructs contoller]
     * @method __construct
     * @param  [String]      $controller [name of the contoller]
     */

    function __construct($controller)
    {
        $this ->  controller =  $controller;
    }
    public function createController() {
        if (file_exists('../app/controllers/'. $this -> controller. '.php')) {
            return new $this -> controller();
        } else {
            return new error();
        }
    }
}
