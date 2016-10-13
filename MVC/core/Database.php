<?php
/**
* This class creates a connection with database
*/

class Database
{

    public $db_conn;
    private static $_instance = null;
    /**
     * [implemements singelton pattern]
     * returns the instance if exists or initates it
     * @method getInstance
     * @return [type]      [description]
     */
    public static function getInstance() {
        if (Database::$_instance == null) {
            Database::$_instance = new Database();
        }
        return Database::$_instance;
    }
    /**
    * [establishes a connection with database]
    * @method __construct
    */
    private function __construct()
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $this->db_conn = new PDO("mysql:host=localhost;dbname=rolustech","root",123);

        // $dsn = 'mysql:host=' . HOST . ';dbname=' . DBNAME;
        // $options = array(
        // PDO::ATTR_PERSISTENT => true,
        // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        // );
        // $this -> db_conn = new PDO($dsn, USERNAME, PASSWORD, $options);
        // if (! isset($this -> db_conn)) {
        //     echo "error in database connection";
        // } else {
        // }
    }
    /**
    * [runs the query on database]
    * @method return_query_data
    * @param  [String]            $query [Query to be executed]
    * @return [array]                   [results of query]
    */
    public function returnQueryData($query)
    {
        $resultArray = array();
        $query = $this -> db_conn ->prepare($query);
        $query->execute();
        if($query->rowCount() > 0) {
            while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                array_push($resultArray, $result);
            }
            return $resultArray;
        }else {
            return null;
        }
    }
}
