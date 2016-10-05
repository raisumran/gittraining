<?php
/**
 *
 */
class StudentsModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function dbCall($columnArray) {
            $array = Request::getInstance() -> params;
            $method = Request::getInstance() -> method;
            $dbQuery =  new DBquery('students');
            $query =  $dbQuery -> $method($array, $columnArray);
            $data =  $dbQuery -> returnQueryData($query);

    }
}

?>
