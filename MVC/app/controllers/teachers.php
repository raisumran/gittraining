<?php
/**
 *
 */
class Teachers extends Controller
{

    function __construct()
    {
        $this ->  columnArray = array ('id', 'name', 'city', 'email');
        $this ->  model = 'TeachersModel';
        parent::__construct();
        $method =  Request::getInstance() -> method;
        parent::$method();
    }

}
