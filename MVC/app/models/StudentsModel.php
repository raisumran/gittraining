<?php
/**
 * Inherits Model class and manages model for students
 */

class StudentsModel extends Model
{
    /**
     * [calls the parents constructor for students]
     * @method __construct
     */

    function __construct()
    {
        $this ->  columnArray = array('id', 'name', 'city', 'email');
        parent::__construct();
    }
}

?>
