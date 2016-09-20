<?php
    class Singleton
    {
        public static $instance;

        public static function getInstance() {
            if(!isset(Singleton::$instance)) {
                echo "Creating new  Instance";
                Singleton::$instance = new Singleton();
            }
            return Singleton::$instance;
        }
        private function __construct() {
            // empty
        }
    }
    class Test
    {
        // empty
    }
    $db = Singleton::getInstance();
    $db2 = Singleton::getInstance();
    var_dump($db);
    var_dump($db2);
    $test = new Test();
    $test2 = new Test();
    var_dump($test);
    var_dump($test2);

?>
