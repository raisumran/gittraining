<?php
/**
 *
 */
class TeachersModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function dbCall($columnArray) {
        $array = Request::getInstance() -> params;
        $method = Request::getInstance() -> method;
        $dbQuery =  new DBquery('teachers');
        $query =  $dbQuery -> $method($array, $columnArray);
        $data =  $dbQuery -> returnQueryData($query);

    }
}

?>
