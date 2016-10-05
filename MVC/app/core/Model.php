<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{

    protected $db;
    // public $db
    /**
     * [creates a new DB object when invoked]
     * @method __construct
    */
    protected $columnArray;
    public function __construct()
    {
        $this->db = Database::getInstance();
        $this ->  columnArray = array('id', 'name', 'city', 'email');
    }
}
