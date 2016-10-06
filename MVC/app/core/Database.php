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
    public function __construct()
    {
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DBNAME;
        $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this -> db_conn = new PDO($dsn, USERNAME, PASSWORD, $options);
        if (! isset($this -> db_conn)) {
            echo "error in database connection";
        } else {
        }
    }
}
