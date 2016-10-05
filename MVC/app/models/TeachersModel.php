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
    public function dbCall() {
        $dbQuery =  new DBquery('teachers',$this -> columnArray );
        $data = $dbQuery -> dbCall();
        return $data;
    }
}

?>
