<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{

    public $db;
    protected $params;
    protected $tableName;
    // public $columnArray;
    public $relationships;
    /**
     * [creates a new DB object and calls database when invoked]
     * @method __construct
    */
    public function __construct($params, $tableName)
    {
        $this->db = Database::getInstance();
        $this -> params = $params;
        $this ->  tableName =  $tableName;
    }
    /**
     * [calls the function to interact with DB ]
     * @method dbCall
     * @param  [String] $method [name of the method to be called ]
     * @return [Array]         [output from database]
     */

    public function dbCall($method) {
        $dbQuery =  new DBquery($this ->  tableName, $this -> columnArray, $this ->  relationships, $this ->  params);
        $query =  $dbQuery ->  $method();
        $lists = array();
        $lists[0] = $this -> columnArray;
        $lists[1] = $this ->  db -> returnQueryData($query);
        if(count($lists[1]) > 0) {
            $lists[1] = $this ->  orm($lists);
        }
        return $lists;
    }
    /**
     * [performs or mapping]
     * @method orm
     * @param  [Array] $lists [data from database]
     * @return [array]        [Array of objects]
     */

    public function orm($lists){
        $temp = array();
        $i = 0;
        foreach ($lists[1] as $value) {
            $j = 0;
            foreach ($value as $val) {
                if($j >= count($lists[0])) {
                    break;
                } else {
                    $temp[$i][$j] = $val;
                }
                $j++;
            }
            $i++;
        }
        return $temp;
    }
}
