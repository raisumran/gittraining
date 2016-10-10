<?php
/**
 * this class uses the query class to make the query for various actions
 */
class DBquery
{
    public $query;
    private $table;
    private $columnArray = array();
    /**
     * [allocates values to properties of class]
     * @method __construct
     * @param  [string]      $table       [name of the table to change]
     * @param  [string]      $columnArray [colums list of the concerend table]
     */

    function __construct($table, $columnArray)
    {
        $this -> query = new Query();
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
        return $this -> $method($array, $this -> columnArray);
    }
    /**
     * [constructs a query for view ALL]
     * @method index
     */
    function index() {
        $this -> query -> select([]);
        return $this -> dbPrepare('index');
        // return ($this ->  query -> select . $this -> query -> from);
    }
    /**
     * [constructs query for create method through helping functions]
     * @method create
     * @param  [array] $arr         [input arguments]
     * @param  [array] $columnArray [colums of concerned table]
     */
    function create($arr, $columnArray)
    {
        $this -> query -> insert($arr);
        return $this ->  dbPrepare('create');
    }
    /**
     * [constructs query for Delete method through helping functions]
     * @method delete
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */

    function delete($arr, $columnArray) {
        $this -> query -> where(array('id'), array($arr[0]), array(' = '));
        return $this ->  dbPrepare('delete');
    }
    /**
     * [constructs query for UPDATE method through helping functions]
     * @method update
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function update($arr, $columnArray) {
        $this -> query ->  update($columnArray, $arr) -> where(array('id'), array($arr[0]), array(' = '));
        return $this -> dbPrepare('update');
    }
    /**
     * [constructs query for Read method through helping functions]
     * @method Read
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function read($arr, $columnArray) {
        $this -> query  -> select( $columnArray) -> where(array('id'), array($arr[0]), array(' = '));
        return $this ->  dbPrepare('read');
    }
    // /**
    //  * [this performs inner or outer join]
    //  * @method join
    //  * @return [type] [description]
    //  */
    //
    // public function join() {
    //     $this -> query  -> select($fields);
    //     $this -> query -> join($type, $this ->  table );
    //     $this ->query -> where($arr, $arr1, $arr2);
    //     return($this ->  query -> select . $this -> query -> from .  $this -> query -> join .' ON ' . $this -> query -> cond);
    // }
    function dbPrepare($method) {
        $query = " ";
        if($method ==  'index') {
            $query = $query .  $this -> selectHelp();
        }else if($method ==  'create') {
            $query = $query . 'INSERT INTO ';
            $query =  $query .  $this -> query ->  table;
            $query = $query . ' VALUES (NULL, ';
            $query =  $query. $this -> listHelp();
            $query = $query . ' )';
        } else if($method == 'delete') {
            $query = $query .  ' DELETE ';
            $query = $query . 'FROM ' . $this ->  query ->  table;
            $query = $query . $this ->  whereHelp();
        }else if($method ==  'update') {
            $query = $query . 'UPDATE ' . $this -> query -> table;
            $query = $query . ' SET ';
            for($i = 0; $i < count($this ->query ->  update[0] ); $i++) {
                $query =  $query . $this ->query ->update[0][$i] . ' = ' . "'". $this ->query ->update[1][$i] ."',";
            }
            $query =  rtrim($query, ",");
            $query = $query . $this ->  whereHelp();
        } else if($method == 'Read') {
            $query = $query . $this ->  selectHelp();
            $query = $query . $this ->  whereHelp();
        }
        return $query;
    }
    /**
     * [implements SELECT and FROM]
     * @method selectHelp
     * @return [String]     [final form of query]
     */

    public function selectHelp() {
        $query = " ";
        $query = $query . ' SELECT ';
        if($this -> query -> fields == null) {
            $query   = $query . ' * ' ;
        } else {
            $query =  $query. $this -> listHelp();
        }
        $query =  $query . ' FROM ';
        $query =  $query . $this ->  query -> table;
        return $query;
    }
    /**
     * [Implements WHERE clause along with condition]
     * @method whereHelp
     * @return [String]    [WHERE part of query]
     */

    public function whereHelp() {
        $query = " ";
        $query = $query . ' WHERE ';
        for ($i =0; $i < count($this -> query -> where[0]); $i++) {
            $query = $query . $this -> query -> where[0][$i] . $this -> query -> where[2][$i] . $this -> query -> where[1][$i] . ' AND';
        }
        $query =  rtrim($query, "AND");
        return $query;
    }
    /**
     * [Helps create a list seperated by commas]
     * @method listHelp
     * @return [String]   [List of objects]
     */
    public function listHelp() {
        $query = " ";
        foreach (($this -> query -> fields) as $value) {
            $query =  $query . "'". $value ."',";
        }
        $query = rtrim ( $query, ",");
        return $query;
    }
    // // public function columnNames() {
    // //     $this -> query = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS ';
    // //     $this ->  where('table_name', $this -> table);
    // //     echo $this -> query;
    // //     return $this ->  query;
    // // }
}
