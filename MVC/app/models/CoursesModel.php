<?php
/**
 * Inherits Model class and manages model for courses
 */

class CoursesModel extends Model
{
    /**
     * [calls the parents constructor for students]
     * @method __construct
     */

    function __construct()
    {
        $this ->  columnArray = array('id', 'name', 'teacherID', 'capacity');
        parent::__construct();
    }
}

?>
