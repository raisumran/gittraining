<?php
/**
 * this class uses the query class to make the query for various actions
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
    // // public function columnNames() {
    // //     $this -> query = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS ';
    // //     $this ->  where('table_name', $this -> table);
    // //     echo $this -> query;
    // //     return $this ->  query;
    // // }
    /**
     * [constructs query for create method through helping functions]
     * @method create
     * @param  [array] $arr         [input arguments]
     * @param  [array] $columnArray [colums of concerned table]
     */
    function create($arr, $columnArray)
    {
        $this -> query -> insertGeneral($this ->  table);
        $this -> query ->  listAppend($arr);
        return ($this -> query -> insert . ' VALUES (NULL, '. $this -> query -> values . ' )');
    }
    /**
     * [constructs a query for vieww ALL]
     * @method index
     */
    function index() {
        $this -> query -> select([]);
        $this -> query -> from();
        return ($this ->  query -> select . $this -> query -> from);
    }
    /**
     * [constructs query for Delete method through helping functions]
     * @method delete
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */

    function delete($arr, $columnArray) {
        $this -> query -> deleteGeneral();
        $this -> query ->  from();
        $this -> query -> cond(array('id'), array($arr[0]), array(' = '));
        return($this -> query -> delete . $this -> query -> from . $this -> query -> where .  $this -> query ->cond);
    }
    /**
     * [constructs query for UPDATE method through helping functions]
     * @method update
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function update($arr, $columnArray) {
        $this -> query ->  updateGeneral($this -> table);

        // repetition , how can I avoid it
        $temp = " ";
        for($i = 0; $i < count($columnArray); $i++) {
            $temp =  $temp . $columnArray[$i] . ' = ' . "'". $arr[$i] ."',";
        }
        $temp =  rtrim($temp, ",");
        // repetition
        $this -> query -> cond(array('id'), array($arr[0]), array(' = '));
        return ($this -> query -> update .$this -> query -> set . $temp . $this -> query -> where . $this -> query -> cond );
    }
    /**
     * [constructs query for Read method through helping functions]
     * @method Read
     * @param  [array] $arr         [input arguments]
     * @param  [array]  [colums of concerned table]
     */
    function read($arr, $columnArray) {
        $this -> query  -> select( $columnArray);
        $this -> query -> from();
        $this -> query -> cond(array('id'), array($arr[0]), array(' = '));
        return ($this -> query  -> select . $this -> query -> from . $this-> query -> where . $this -> query -> cond);
    }
    // /**
    //  * [this performs inner or outer join]
    //  * @method join
    //  * @return [type] [description]
    //  */
    //
    // public function join() {
    //     $this -> query  -> select($fields);
    //     $this -> query -> from($this -> table);
    //     $this -> query -> join($type, $this ->  table );
    //     $this ->query -> cond($arr, $arr1, $arr2);
    //     return($this ->  query -> select . $this -> query -> from .  $this -> query -> join .' ON ' . $this -> query -> cond);
    // }

}
?>
