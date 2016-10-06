<?php
/**
 * This class parses URl and calls the respective controller and method
 */

class App
{
    public function controllerCall() {
            $cFactory =  new ControllerFactory();
            $cHandle = $cFactory ->  createController(Request::getInstance() -> controller);
            // $controller = Request::getInstance() -> controller;
    }
}
