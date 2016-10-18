<?php
/**
 * this class uses the query class to make the query for various actions
 */
class DBquery
{
    public $query;
    private $table;
    private $columnArray = array();
    private $relationships;
    private $params;
    private $fields;
    private $where;
    private $update;
    private $join;
    /**
     * [allocates values to properties of class]
     * @method __construct
     * @param  [string]      $table       [name of the table to change]
     * @param  [string]      $columnArray [colums list of the concerend table]
     */

    function __construct($table, $columnArray, $relationships, $params)
    {
        $this ->  table = $table;
        $this ->  columnArray =  $columnArray;
        for($i = 0; $i < count($columnArray); $i++) {
            $this -> columnArray[$i] = $columnArray[$i];
        }
        $this ->  relationships = $relationships;
        $this ->  params = $params;

        $this ->  fields = array();
        $this  -> where = array();
        $this  -> update = array();
        $this  -> join = array();
    }

    /**
     * [constructs a query for view ALL]
     * @method index
     */
    function index() {
        $this ->  select([]);
        return $this -> dbPrepare();
        // return ($this -> select . $this -> from);
    }
    /**
     * [constructs query for create method through helping functions]
     * @method create
     * @param  [array] $arr         [input arguments]
     * @param  [array] $columnArray [colums of concerned table]
     */
    function create()
    {
        $this -> insert($this -> params);
        return $this ->  dbPrepare();
    }
    /**
     * [constructs query for Delete method through helping functions]
     * @method delete
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */

    function delete() {
        $this -> where(array('id'), array($this -> params[0]), array(' = '));
        return $this ->  dbPrepare();
    }
    /**
     * [constructs query for UPDATE method through helping functions]
     * @method update
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    // this function updates all the fields of the table, for flexibility it
    // must allow updating a single field, and input can be changed accordingly
    // also it deals with one condition only however, user might give more
    // than one input and in that case each input can stored as an entry and
    // loop can be looped through to incorporate values.
    function update() {
        $this ->   updateHelp($this -> columnArray, $params) -> where(array('id'), array($arr[0]), array(' = '));
        return $this -> dbPrepare();
    }
    /**
     * [constructs query for Read method through helping functions]
     * @method Read
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function read() {
        $this ->  select( $this -> columnArray) -> where(array('id'), array($params[0]), array(' = '));
        return $this ->  dbPrepare();
    }
    /**
     * [this performs inner or outer join]
     * @method join
     * @return [type] [description]
     */
    // This part is hardcoded for now, but I need to allocate
    // a relationship from the model, and then I can make use of
    // that
    public function join() {
        $_GLOBALS[0] = $this -> relationships["teacherscourses"]["select"];
        $this -> select($this -> relationships["teacherscourses"]["select"]);
        $this ->  joinHelp($this -> relationships["teacherscourses"]);
        // it need to have a where clause but I will be taking it as users
        // input
        return $this -> dbPrepare('join');
    }
    public function select( $arr) {
        $this ->  fields = $arr;
        return $this;
    }
    /**
     * [Adds insert clause to query]
     * @method insertGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function insert($arr) {
        $this ->  fields = $arr;
        return $this;
    }
    public function where($compField, $compValue, $compOper) {
        $this -> where[0] = $compField;
        $this -> where[1] = $compValue;
        $this ->  where[2] = $compOper;
        return $this;
    }
    /**
     * [Adds update clause to query]
     * @method updateGeneral
     * @param  [string]        $tableName [name of the table]
     */
    public function updateHelp($columnArray, $arr) {
        $this ->  update[0] = $columnArray;
        $this ->  update[1]  = $arr;
        return $this;
    }
    /**
     * [set the join property of query class]
     * @method join
     * @param  [string] $type  [type of join , inner/outer]
     * @param  [table] $table [name of the table to join]
     */

    public function joinHelp($joinArr) {
        // 0 => left
        $this ->  join[0] =  $joinArr["left"];
        $this -> join[1] = $joinArr["right"];
        $this -> join[2] = $joinArr["type"];
        $this -> join[3] = $joinArr["on"];

    }

    function dbPrepare() {
        $method =  (debug_backtrace()[1]['function']);
        $query = " ";
        if($method ==  'index') {
            $query = $query .  $this -> selectHelp();
        }else if($method ==  'create') {
            $query = $query . 'INSERT INTO ';
            $query =  $query .  $this ->  table;
            $query = $query . ' VALUES (NULL, ';
            $query =  $query. $this -> listHelp();
            $query = $query . ' )';
        } else if($method == 'delete') {
            $query = $query .  ' DELETE ';
            $query = $query . 'FROM ' . $this ->  table;
            $query = $query . $this ->  whereHelp();
        }else if($method ==  'update') {
            $query = $query . 'UPDATE ' . $this -> table;
            $query = $query . ' SET ';
            for($i = 0; $i < count($this ->query ->  update[0] ); $i++) {
                $query =  $query . $this ->query ->update[0][$i] . ' = ' . "'". $this ->query ->update[1][$i] ."',";
            }
            $query =  rtrim($query, ",");
            $query = $query . $this ->  whereHelp();
        } else if($method == 'Read') {
            $query = $query . $this ->  selectHelp();
            $query = $query . $this ->  whereHelp();
        } else if($method == 'join') {
            $query = $query .  $this -> selectHelp();
            $query = $query . $this -> join[2];
            $query = $query . ' JOIN ' . $this -> join[1];
            $query = $query . ' ON ' .$this -> join[3][0];
            $query = $query . ' = ' . $this -> join[3][1];
        }
        $query = str_replace("'","",$query);
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
        if($this ->fields == null) {
            $query   = $query . ' * ' ;
        } else {
            $query =  $query. $this -> listHelp();
        }
        $query =  $query . ' FROM ';
        $query =  $query . $this ->  table;
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
        for ($i =0; $i < count($this -> where[0]); $i++) {
            $query = $query . $this -> where[0][$i] . $this -> where[2][$i] . $this -> where[1][$i] . ' AND';
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
        foreach (($this -> fields) as $value) {
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
