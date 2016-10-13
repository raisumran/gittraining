<?php
    /**
     *This class builds the generic query
     */
    class Query
    {
        //
        public $table;
        public $fields;
        public $where;
        public $update;
        public $join;

        function __construct()
        {
            $this -> table = Request::getInstance() -> controller;
            $this ->  fields = array();
            $this  -> where = array();
            $this  -> update = array();
            $this  -> join = array();
        }
        /**
         * [Adds selectALL clause to query]
         * @method insertGeneral
         * @param  [string]        $tableName [name of the table]
         */
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
        public function update($columnArray, $arr) {
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

        public function join($joinArr) {
            // 0 => left
            $this ->  join[0] =  $joinArr["left"];
            $this -> join[1] = $joinArr["right"];
            $this -> join[2] = $joinArr["type"];
            $this -> join[3] = $joinArr["on"];

        }
        // /** [implements sort functionality]
        //  * @method orderBy
        //  * @param  [type]  $arr [colums for sorting]
        //  */
        // public function orderBy($arr) {
        //     $this ->  orderBy = ($this -> orderBy) . ' ORDER BY ';
        // }
        // /**
        //  * [limits the number of records to be displayed]
        //  * @method limit
        //  * @param  [string] $val [number of records to be displayed]
        //  * @return [type]      [description]
        //  */
        //
        // public function limit($val) {
        //     $this -> limit =  ($this ->  limit) . ' LIMIT ' . $val;
        // }
    }
