<?php
/**
 * THis class is the Controller class for the menu page
 * This class confirms that you are logged in and then directs you to
 * ... view/dashboard/index.php
 */


class Dashboard extends Controller
{
    public function contruct()
    {

    }
    /**
     * [Confirms you are logged in and directs you to view/dashboard/index]
     * @method index
     */

    public function index()
    {
        // Session::init();
        // $logged = Session::get('loggedIn');
        // if ($logged == false) {
        //     Session::destroy();
        //     header('location: login/logIn');
        //     exit;
        // }
        $this -> view('dashboard/index', []);
    }
}
