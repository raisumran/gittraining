<?php
/**
 * this class inherits the Controller class
 * and initiates operation for students
 */
class Students extends Controller
{

    /**
     * [calls the parent class constructor]
     * @method __construct
     */
    function __construct()
    {
        parent::__construct('StudentsModel');

    }
}
