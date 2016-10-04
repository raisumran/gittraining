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
    public function viewAll() {
        $dbQuery =  new DBquery('students');
        $query =  $dbQuery -> viewAll();
        $data =  $dbQuery -> returnQueryData($query, True);

    }
    public function delete() {
        $array = Request::getInstance() -> params;
        $dbQuery =  new DBquery('students');
        $query =  $dbQuery -> delete($array);
        $data =  $dbQuery -> returnQueryData($query, False);
    }
    public function update($columnArray) {
        $array = Request::getInstance() -> params;
        $dbQuery =  new DBquery('students');
        $query =  $dbQuery -> update($array,$columnArray);
        $data =  $dbQuery -> returnQueryData($query, False);
    }
    public function read($columnArray) {
        $array = Request::getInstance() -> params;
        $dbQuery =  new DBquery('students');
        $query =  $dbQuery -> read($array, $columnArray);
        $data =  $dbQuery -> returnQueryData($query, True);
    }
}

?>
