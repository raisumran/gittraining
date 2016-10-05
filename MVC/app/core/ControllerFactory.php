<?php
/**
 *
 */
class ControllerFactory
{

    function __construct()
    {
        // return (new $controller());
    }
    public function createController($controller){
        return new $controller();
    }
}
