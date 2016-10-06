<?php
/**
 *
 */
class StudentsModel extends Model
{

    function __construct()
    {
        parent::__construct('students');
    }

    public function dbCall() {
        // $dbQuery =  new DBquery('students', $this -> columnArray);
        // $data = $dbQuery -> dbCall();
        // return $data;
    }
}

?>
