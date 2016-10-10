<?php
    /**
     *This class builds the generic query
     */
    class Query
    {
        public $select;
        public $from;
        public $insert;
        public $values;
        public $cond;
        public $where;
        public $delete;
        public $update;
        public $set;
        public $join;
        function __construct()
        {
            $this  -> where = " WHERE ";
            $this  -> delete =  ' DELETE ';
            $this  -> set = " SET ";
        }

        /**
         * [appends the list seperated by commas]
         * @method listAppend
         * @param  [array]     $arr [values to be appended]
         * @return [type]          [description]
         */

        public function listAppend($arr) {
            foreach ($arr as $value) {
                $this ->  values =  ($this -> values) . "'". $value ."',";
            }
            $this ->  values = rtrim ( $this ->  values, ",");
        }
        /**
         * [Adds insert clause to query]
         * @method insertGeneral
         * @param  [string]        $tableName [name of the table]
         */
        public function insertGeneral($tableName) {
            $this -> insert = $this -> insert . 'INSERT INTO '. $tableName;
        }
        /**
         * [Adds selectALL clause to query]
         * @method insertGeneral
         * @param  [string]        $tableName [name of the table]
         */
        public function select( $arr) {

            $this -> select  = ($this -> select) . 'SELECT ';
            if($arr == null) {
                $this -> select  = $this -> select . ' * ' ;
            } else {
                $this ->  listAppend($arr);
                $this -> select = $this -> select . $this -> values;
            }
        }
        /**
         * [Implements FROM part of query]
         * @method from
         */
        public function from() {
            $this -> from  = ($this  ->from). ' FROM '  . (Request::getInstance() -> controller);
        }
        public function cond($field, $value, $oper) {
            for ($i =0; $i < count($field); $i++) {
                $this -> cond = $this -> cond . $field[$i] . $oper[$i] . $value[$i] . ' AND';
            }
            $this -> cond =  rtrim($this -> cond, "AND");
        }
        /**
         * [Adds update clause to query]
         * @method updateGeneral
         * @param  [string]        $tableName [name of the table]
         */
        public function updateGeneral($tableName) {
            $this -> update = ($this -> update) .  'UPDATE '  . $tableName;
        }
        /**
         * [set the join property of query class]
         * @method join
         * @param  [string] $type  [type of join , inner/outer]
         * @param  [table] $table [name of the table to join]
         */

        public function join($type, $table) {
            $this ->  join =  $this ->  join . $type . ' JOIN '. $table;
        }
        //  * [implements sort functionality]
        //  * @method orderBy
        //  * @param  [type]  $arr [colums for sorting]
        //  */
        // public function orderBy($arr) {
        //     $this ->  query = ($this -> query) . ' ORDER BY ';
        //     $this ->  listAppend($arr);
        // }
        // /**
        //  * [limits the number of records to be displayed]
        //  * @method limit
        //  * @param  [string] $val [number of records to be displayed]
        //  * @return [type]      [description]
        //  */
        //
        // public function limit($val) {
        //     $this -> query =  ($this ->  query). ' LIMIT ' . $val;
        // }
    }
