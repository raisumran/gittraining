<?php
class Dashboard extends Controller {
    public function __contruct() {

    }
    public function index() {
        Session::init();
        $logged = Session::get('loggedIn');
        echo $logged;
        if($logged == false) {
            Session::destroy();
            header('location: login/logIn');
            exit;
        }
        echo "dashboard reached";
    }
}
?>
