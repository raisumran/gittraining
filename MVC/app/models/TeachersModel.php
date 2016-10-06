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
    function __construct()
    {
        parent::__construct('teachers');
    }
}
