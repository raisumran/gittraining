<?php
/**
 *
 */
class DBquery
{
    private $table;
    private $method;

    function __construct($table, $method)
    {
        $this ->  table = $table;
        $this ->  method =  $method;
    }
    function create($arr)
    {
        $query = "INSERT INTO students(name, city, email)
            VALUES ('$arr[0]','$arr[1]','$arr[2]') ";
        echo $query;
        return $query;
    }
}

?>
