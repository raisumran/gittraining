<?php
/**
 * this class communicates with database
 */
class DBquery
{
    public $query;
    private $table;
    private $columnArray = array ();
    /**
     * [allocates values to properties of class]
     * @method __construct
     * @param  [string]      $table       [name of the table to change]
     * @param  [string]      $columnArray [colums list of the concerend table]
     */

    function __construct($table, $columnArray)
    {
        $this -> query = "";
        $this ->  table = $table;
        for($i = 0; $i < count($columnArray); $i++) {
            $this -> columnArray[$i] = $columnArray[$i];
        }
    }
    /**
     * [constructs and executes a query ]
     * @method dbCall
     * @return [Array] [result of query execution]
     */
    public function dbCall() {
        $array = Request::getInstance() -> params;
        $method = Request::getInstance() -> method;
        echo $this -> query . " yeah cheez <br>";
        $this -> $method($array, $this -> columnArray);
        echo $this -> query . " yeah cheez <br>";
        return $this -> returnQueryData($this -> query);
    }
    /**
     * [constructs query for create method through helping functions]
     * @method create
     * @param  [array] $arr         [input arguments]
     * @param  [array] $columnArray [colums of concerned table]
     */
    function create($arr, $columnArray)
    {
        $this -> insertGeneral($this ->  table);
        $this -> query = $this -> query . ' VALUES (NULL, ';
        foreach ($arr as &$value) {
            $this -> query =  $this -> query . "'". $value ."',";
        }
        $this -> rtrimGeneral( ",");
        $this -> query = $this -> query . ')';
    }
    /**
     * [constructs a query for vieww ALL]
     * @method index
     */
    function index() {
        $this -> selectAll($this ->  table);
    }
    /**
     * [constructs query for Delete method through helping functions]
     * @method delete
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */

    function delete($arr, $columnArray) {
        $this -> deleteGeneral($this -> table);
        $query. $this ->  where('id', $arr[0]);
    }
    /**
     * [constructs query for UPDATE method through helping functions]
     * @method update
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function update($arr, $columnArray) {
        $query = $this -> updateGeneral($this -> table);
        for($i = 0; $i < count($columnArray); $i++) {
            $query =  $query . $columnArray[$i] . ' = ' . "'". $arr[$i] ."',";
        }
        $this -> rtrimGeneral(",");
        $this -> where('id', $arr[0]);
    }
    /**
     * [constructs query for Read method through helping functions]
     * @method Read
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function read($arr, $columnArray) {
        $this -> query = 'SELECT ' ;
        foreach ($columnArray as &$value) {
            $query =  $query . $value .",";
        }
        $this ->  rtrimGeneral( ",");
        $query .' FROM '.  $this -> table;
        $query . $this-> where('id', $arr[0]);
    }
    // supporting functions
    /**
     * [trims the trailing characters of query as per input]
     * @method rtrimGeneral
     * @param  [string]       $str [char to delete]
     */

    public function rtrimGeneral($str) {
        $this ->  query =  rtrim($this -> query, $str);
        echo $this -> query . " yeah cheez <br>";
    }
    /**
     * [Adds insert clause to query]
     * @method insertGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function insertGeneral($tableName) {
        $this -> query = $this -> query . 'INSERT INTO '. $tableName;
    }
    /**
     * [Adds selectALL clause to query]
     * @method insertGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function selectAll($tableName) {
        $this -> query  = $this -> query . 'SELECT * FROM '  . $tableName;
        // echo $this -> query . " yeah cheez <br>";
    }
    /**
     * [inserts WHERE clause]
     * @method where
     * @param  [String] $field [field to be compared]
     * @param  [String] $value [Value to be compared]
     * @return [type]        [description]
     */
    public function where($field, $value) {
        $this -> query = $this -> query . ' WHERE '. $field . ' = '. $value;
    }
    /**
     * [Adds update clause to query]
     * @method updateGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function updateGeneral($tableName) {
        $this -> query = $this -> query .  'UPDATE '  . $tableName .' SET ';
    }
    /**
     * [Adds delete clause to query]
     * @method deleteGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function deleteGeneral ($tableName) {
        $this -> query = $this -> query . 'DELETE FROM '  . $tableName ;
    }
    /**
    * [runs the query on database]
    * @method return_query_data
    * @param  [String]            $query [Query to be executed]
    * @return [array]                   [results of query]
    */
    public function returnQueryData($query)
    {
        $method = Request::getInstance() -> method;
        $controller = Request::getInstance() -> controller;

        $table_data_array = array();
        if($method == 'index' || $method == 'read' || $controller == 'login') {
        // if($flag ==  True) {
            try {
                $response = Database::getInstance()-> db_conn ->  query($query);
                while ($row = $response->fetch(\PDO::FETCH_ASSOC)) {
                    $obj = (object)$row;
                    $table_data_array[$obj->id] = $obj;
                    // array_push($table_data_array, $row);
                }
            } catch (\PDOException $e) {
                echo $e;
            }
            return $table_data_array;
        } else {
            Database::getInstance()-> db_conn -> query($query);
            return null;
        }
    }
}

?>
