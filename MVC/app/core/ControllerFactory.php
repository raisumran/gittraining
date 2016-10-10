<?php
/**
 * constructs controllers
 */
class ControllerFactory
{

    /**
     * [constructs contoller]
     * @method __construct
     * @param  [String]      $controller [name of the contoller]
     */

    function __construct($controller)
    {
        if (file_exists('../app/controllers/'. $controller. '.php')) {
            new $controller();
        } else {
            echo " error";
        }
    }
}
