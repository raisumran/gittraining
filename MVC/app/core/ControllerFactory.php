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
        new $controller();
    }
}
