<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    /**
     * Class Database contains database Info and methods of processing
     * Database under process
     * functions to read queries from a sql file and execute them
     */
class Database
{
    // Variable to hold connection ID and database detail
    private $conn;
    private $dbName;
    /**
     * [constructor of database class]
     * @method __construct
     * @param  [string]      $ip       [address of server]
     * @param  [string]      $userName [Username of authorised]
     * @param  [String]      $pwd      [password of authorised]
     * @param  [String]      $dbName   [Database to be updated]
     */
    public function __construct($ip, $userName, $pwd, $dbName)
    {
        $this -> conn = $this -> connect($ip, $userName, $pwd);
        $this -> dbName = $dbName;
    }
    /**
     * [makes a connection with mysql]
     * @method connect
     * @param  [String]  $ip       [address of server]
     * @param  [String]  $userName [Username of authorised]
     * @param  [String]  $pwd      [password of authorised]
     * @return [String]  $conn     [Connection ID]
     */
    private function connect($ip, $userName, $pwd)
    {
        $conn = mysqli_connect($ip, $userName, $pwd);
        if (!$conn) {
            die('no connection made');
        }
        return $conn;
    }
    /**
     * [Selects a database to update]
     * @method selectDB
     */
    public function selectDB()
    {
        mysqli_select_db($this -> conn, $this -> dbName);
    }
    /**
     * [Reads file and extracts queries as one string]
     * @method processQueries
     * @param  [file]         $query_file [file containing queries]
     */
    public function processQueries($query_file)
    {
        $fp = fopen($query_file, 'r');
        $sql = fread($fp, filesize($query_file));
        fclose($fp);
        return $sql;
        // $this -> getQueries($sql);
    }

    /**
     * [calls for updates in database]
     * @method exeQuery
     * @param  [String]   $query [Query to ping]
     */
    public function exeQuery($query)
    {
        // echo $this -> conn;
        $retVal = mysqli_query($this -> conn, $query);
        if (! $retVal) {
            die('Could not execute query: ' . mysql_error());
        }
        return $retVal;
    }
    /**
     * [closes the connection ]
     * @method connectClose
     */
    public function connectClose()
    {
        mysqli_close($this -> conn);
    }
}
