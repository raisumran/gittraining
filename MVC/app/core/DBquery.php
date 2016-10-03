<?php
/**
 *
 */
class DBquery
{
    private $table;

    function __construct($table)
    {
        $this ->  table = $table;
    }
    function create($arr)
    {
        // $query = 'INSERT INTO '. $this -> table .'(name,'.'city,'.'email)'. ' VALUES ('. "'". $arr[0] ."'".','. "'".$arr[1] ."'". ','. "'".$arr[2] ."'". ')';
        $query = 'INSERT INTO '. $this -> table . ' VALUES (NULL, ';
        foreach ($arr as &$value) {
            $query =  $query . "'". $value ."',";
        }
        $query = rtrim($query, ",");
        $query = $query . ')';
        echo $query;
        return $query;
    }
}

?>
