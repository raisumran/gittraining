<?php
    /**
     * this file tests the Calculator Class
     */

    require("Database.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    /**
     * This class is to test the Database class
     * this tests functions collectively
     * @todo [test for sub()]
     */

class DatabaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * [tests the functions of database class collectively]
     * @method test
     * @return [Bool] [Returns true if output is expected]
     */

    public function test() {
        $db = new Database('localhost', 'root', '123', 'rolustech');
        $db -> selectDB();
        $query_file = 'sql_query_test1.sql';
        $sql = $db -> processQueries($query_file);
        $retVal = $db -> exeQuery($sql);
        $output = null;
        while($row = mysqli_fetch_assoc($retVal)) {
            $output = $output. $row['first_name'];
        }
        $this->assertEquals("DaleHarry", $output);
    }
    //********* Code below was used to create database****
    // public function databaseCreation() {
    //     $db = new Database('localhost:3306', 'root', '123', 'rolustech');
    //     $db -> selectDB();
    //     $query_file = 'sql_query.sql';
    //     $sql = $db -> processQueries($query_file);
    //     $sqlTemp = "";
    //     $retVal = null;
    //     for ($i = 0; $i < strlen($sql); $i++) {
    //         if ($sql[$i] == ";") {
    //             // calls the function exeQuery
    //             $retVal = $db -> exeQuery($sqlTemp);
    //             $sqlTemp = "";
    //             echo $retVal;
    //         } else {
    //             $sqlTemp = $sqlTemp.$sql[$i];
    //         }
    //     }
    // }
}
