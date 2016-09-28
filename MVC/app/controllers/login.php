<?php
/**
 *
 */
class Login extends Controller
{

    function __construct()
    {
        # code...
    }
    public function logIn() {
        $this -> view('login/index', []);
    }
    public function run() {
        $user = $this -> model('LoginModel');
        $user -> run();
        $this -> view('login/index', []);
    }
}

?>
