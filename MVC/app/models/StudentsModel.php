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
        $name = $_POST["name"];
        $city = $_POST["city"];
        $email = $_POST["email"];
        echo $name;
        $array = $numbersArray = array($name, $city, $email);
        $dbQuery =  new DBquery($this -> table,'CREATE');
        $query =  $dbQuery -> create($array);
        $this -> db ->returnQueryData($query, False);
        // require_once("../app/controllers/dashboard.php");
    }
}

?>
