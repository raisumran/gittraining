<?php
/**
 *
 */
class Students extends Controller
{

    function __construct()
    {
        $this ->  columnArray = array ('id', 'name', 'city', 'email');
        $this ->  model = 'StudentsModel';
        parent::__construct();
        $method =  Request::getInstance() -> method;
        parent::$method();

    }
}
