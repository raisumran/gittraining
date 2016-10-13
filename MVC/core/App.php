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
            $cFactory =  new ControllerFactory(Request::getInstance() -> controller);
            return $cFactory ->  createController();
    }
}
