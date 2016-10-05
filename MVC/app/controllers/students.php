<?php
/**
 *
 */
class Students extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this ->  model = 'StudentsModel';
        parent::action();

    }
}
