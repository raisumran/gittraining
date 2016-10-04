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
    public function create(){

        // $array = $_POST["param"];
        $array = Request::getInstance() -> params;
        $dbQuery =  new DBquery('students');
        $query =  $dbQuery -> create($array);
        $dbQuery -> returnQueryData($query, False);
    }
}

?>
