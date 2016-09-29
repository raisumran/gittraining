<?php
/**
 * This is the model class for Login controller
 * checks whether use is authenctic and starts a session
 */
class LoginModel extends Model
{
    /**
     * [Calls the Model class contrcutor which ulitimately initiates DB]
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * [checks if username and password is legit and creates a sesion]
     * @method run
     * @return [type] [description]
     */
    public function run()
    {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $data = $this -> db ->returnQueryData(
            "SELECT * FROM `users`
            WHERE `login` LIKE '$login'
            AND `password` LIKE '$password'
            LIMIT 0 , 30"
        );
        require_once("../app/controllers/dashboard.php");
        if ($data != null) {
            echo "yahan hmesha aata hai";
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login/logIn');
        }
    }
}
