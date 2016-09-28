<?php
/**
 *
 */
class LoginModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function run() {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $data = $this -> db ->return_query_data("SELECT * FROM `users`
            WHERE `login` LIKE '$login'
            AND `password` LIKE '$password'
            LIMIT 0 , 30");
        print_r($data);
        require_once("../app/controllers/dashboard.php");
        if($data != null) {
            echo "yahan hmesha aata hai";
            Session::init();
            Session::set('loggedIn', true) ;
            header('location: ../dashboard');
            // login
        } else{
            echo "yahan aaya hai" ;
            header('location: ../login/logIn');
            echo "not a valid password or login <br>";
        }

    }
}
?>
