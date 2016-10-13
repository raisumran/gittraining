<?php
/**
* Acts as a parent class for all model clasee
*/
class Model
{

    public $db;
    public $list = array();
    /**
     * [creates a new DB object and calls database when invoked]
     * @method __construct
    */
    public $columnArray;
    public $relationships;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
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
