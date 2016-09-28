<?php
/**
 *
 */
class Database extends PDO
{
    public $db_conn;
    public function __construct()
    {
        $dsn = 'mysql:host=' . "localhost" . ';dbname=' ."rolustech";
        $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this -> db_conn = new PDO($dsn, "root", "123", $options);
        if(! isset($this -> db_conn)) {
            echo "error in database connection";
        } else {
            echo "connection to db made <br>";
        }
    }
    public function return_query_data($query)
{
    $table_data_array = array();
    try
    {
    $response = $this -> db_conn-> query($query);
    while ($row = $response->fetch(\PDO::FETCH_ASSOC)) {
        array_push($table_data_array, $row);
    }
    } catch (\PDOException $e)
    {
        echo $e;
    }
    return $table_data_array;
}
    public function rowCount($query)
    {
        $response = $this -> db_conn -> query($query);
        return $response ->rowCount();
    }
}
