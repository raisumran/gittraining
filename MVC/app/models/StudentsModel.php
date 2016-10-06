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
        parent::__construct('students');
    }
}

?>
