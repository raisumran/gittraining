<?php
    /**
     *This class builds the generic query
     */
    class Query
    {
        //
        public static $fields;
        public static $where;
        public static $update;

        function __construct()
        {
            $this -> table = Request::getInstance() -> controller;
            $this ->  fields = array();
            $this  -> where = array();
            $this  -> update = array();
            $this  -> set = " SET ";
        }
        /**
         * [Adds selectALL clause to query]
         * @method insertGeneral
         * @param  [string]        $tableName [name of the table]
         */
        public function select( $arr) {
            $this ->  fields = $arr;
            return self;
        }
        /**
         * [Implements FROM part of query]
         * @method from
         */
        public function from() {

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
        public function insertGeneral($arr) {
            $this ->  fields = $arr;
        }
        public function where($compField, $compValue, $compOper) {
            $this -> where[0] = $compField;
            $this -> where[1] = $compValue;
            $this ->  where[2] = $compOper;
        }
        /**
         * [Adds update clause to query]
         * @method updateGeneral
         * @param  [string]        $tableName [name of the table]
         */
        public function update($columnArray, $arr) {
            $this ->  update[0] = $columnArray;
            $this ->  update[1]  = $arr;
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
        /** [implements sort functionality]
         * @method orderBy
         * @param  [type]  $arr [colums for sorting]
         */
        public function orderBy($arr) {
            $this ->  orderBy = ($this -> orderBy) . ' ORDER BY ';
        }
        /**
         * [limits the number of records to be displayed]
         * @method limit
         * @param  [string] $val [number of records to be displayed]
         * @return [type]      [description]
         */

        public function limit($val) {
            $this -> limit =  ($this ->  limit) . ' LIMIT ' . $val;
        }
    }
