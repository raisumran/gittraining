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
    /**
     * [allocates values to properties of class]
     * @method __construct
     * @param  [string]      $table       [name of the table to change]
     * @param  [string]      $columnArray [colums list of the concerend table]
     */

    function __construct($table, $columnArray, $relationships, $params)
    {
        $this -> query = new Query($table);
        $this ->  table = $table;
        $this ->  columnArray =  $columnArray;
        for($i = 0; $i < count($columnArray); $i++) {
            $this -> columnArray[$i] = $columnArray[$i];
        }
        $this ->  relationships = $relationships;
        $this ->  params = $params;
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
    function create()
    {
        $this -> query -> insert($this -> params);
        return $this ->  dbPrepare('create');
    }
    /**
     * [constructs query for Delete method through helping functions]
     * @method delete
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */

    function delete() {
        $this -> query -> where(array('id'), array($this -> params[0]), array(' = '));
        return $this ->  dbPrepare('delete');
    }
    /**
     * [constructs query for UPDATE method through helping functions]
     * @method update
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function update() {
        $this -> query ->  update($this -> columnArray, $params) -> where(array('id'), array($arr[0]), array(' = '));
        return $this -> dbPrepare('update');
    }
    /**
     * [constructs query for Read method through helping functions]
     * @method Read
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function read() {
        $this -> query  -> select( $this -> columnArray) -> where(array('id'), array($params[0]), array(' = '));
        return $this ->  dbPrepare('read');
    }
    /**
     * [this performs inner or outer join]
     * @method join
     * @return [type] [description]
     */

    public function join() {
        $_GLOBALS[0] = $this -> relationships["teacherscourses"]["select"];
        $this -> query  -> select($this -> relationships["teacherscourses"]["select"]);
        $this -> query -> join($this -> relationships["teacherscourses"]);
        return $this -> dbPrepare('join');
    }
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
        } else if($method == 'join') {
            $query = $query .  $this -> selectHelp();
            $query = $query . $this ->  query -> join[2];
            $query = $query . ' JOIN ' . $this ->  query -> join[1];
            $query = $query . ' ON ' .$this ->  query -> join[3][0];
            $query = $query . ' = ' . $this ->  query -> join[3][1];
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
