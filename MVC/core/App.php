<?php
/**
 * Initiates the app
 */

class App
{
    /**
     * [constructs the required controoler via controlerFactory]
     * @method controllerCall
     */
    public function controllerCall() {
            // controllerFactory does send an error,
            // I can invoke the error controller if something goes wrong 
            $cFactory =  new ControllerFactory(Request::getInstance() -> controller);
            return $cFactory ->  createController();
    }
}
