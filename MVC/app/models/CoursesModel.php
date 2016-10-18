<?php
/**
 * Inherits Model class and manages model for courses
 */

class CoursesModel extends Model
{
    public $columnArray = array('id', 'name', 'teacherID', 'capacity');
    public $tableName = 'courses';
    public $relationships = [];

}

?>
