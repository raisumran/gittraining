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
    public $columnArray;
    public function __construct()
    {

        $this->db = Database::getInstance();
        $dbQuery =  new DBquery(Request::getInstance() -> controller, $this -> columnArray);
        $query = $dbQuery -> dbCall();
        echo $query;
        $GLOBALS = $this ->  db -> returnQueryData($query);
    }
}
