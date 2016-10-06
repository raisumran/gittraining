<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{

    protected $db;
    /**
     * [creates a new DB object and calls database when invoked]
     * @method __construct
    */
    protected $columnArray;
    public function __construct($cName)
    {
        $this->db = Database::getInstance();
        $this ->  columnArray = array('id', 'name', 'city', 'email');
        $dbQuery =  new DBquery($cName, $this -> columnArray);
        $GLOBALS = $dbQuery -> dbCall();
    }
}
