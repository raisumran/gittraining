<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{

    public $db;

    /**
     * [creates a new DB object and calls database when invoked]
     * @method __construct
    */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    /**
     * [calls the function to interact with DB ]
     * @method dbCall
     * @param  [String] $method [name of the method to be called ]
     * @return [Array]         [output from database]
     */

    public function dbCall($params) {
        $dbQuery =  new DBquery($this ->  tableName, $this -> columnArray, $this ->  relationships, $params);
        $method =  (debug_backtrace()[1]['function']);
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
        // What is best place to do ORM, I have choosen this becuase
        // this is a model side operation and in this case basemodel deals with
        // it
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
