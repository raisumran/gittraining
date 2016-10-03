<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{
    protected $tableName;
    protected $columns;

    // public $db
    /**
     * [creates a new DB object when invoked]
     * @method __construct
     */
    public function __construct()
    {
        $this -> db =  new Database();
    }
}
