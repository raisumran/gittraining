<?php
/**
 * Inherits Model class and manages model for teachers
 */
class TeachersModel extends Model
{
    /**
     * [calls the parents constructor for teachers]
     * @method __construct
     */
    public $Teacherscourses;
    function __construct()
    {
        // select order_date, order_amount
        // from customers
        // join orders
        // on customers.customer_id = orders.customer_id
        // where customer_id = 3
        $left =  "teachers.name";
        $right = "courses.name";
        $this ->  relationships = array("teacherscourses" => array(
            "select" => array($left, $right),
            // "left" => "teachers ",
            "type" => " one to many ",
            "joinType" => 'INNER',
            "right" => "courses",
            "on" => array("teachers.ID", "courses.TeacherID")
            )
        );
        $this ->  columnArray = array('id', 'name', 'city', 'email');
        parent::__construct();
    }
}
