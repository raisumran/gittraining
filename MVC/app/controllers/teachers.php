<?php
/**
 *
 */
class Teachers extends Controller
{

    function __construct()
    {
        $this ->  model = 'TeachersModel';
        parent::__construct();
        parent::action();
    }

}
