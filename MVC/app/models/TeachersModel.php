<?php
/**
 * Inherits Model class and manages model for teachers
 */
class TeachersModel extends Model
{
    public $columnArray = array('id', 'name', 'city', 'email');
    public $relationships = array("teacherscourses" => array(
        "select" => array("teachers.name", "courses.name"),
        "type" => " one to many ",
        "joinType" => 'INNER',
        "right" => "courses",
        "on" => array("teachers.ID", "courses.TeacherID")
        )
    );

}
