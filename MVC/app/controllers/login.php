<?php
/** This classes is the controller class for loginpage
 *This takes thes login details by user, checks if the user is legit via model,
 *....starts a session and redirects user to viewlogin/index
 */
class Login extends Controller
{
    public function __construct()
    {
        # code...
    }
    /**
     * [calls view to display login form]
     * @method logIn
     */
    public function logIn()
    {
        $vM = new ViewManager('login/index');
        $vM -> render();
        // $this -> view('login/index', []);
    }
    /**
     * [Calls model to ensure user is legit and then redirects to dashboard controller]
     * @method run
     */
    public function run()
    {
        $user = $this -> model('LoginModel');
        $user -> run();
        // $this -> view('login/index', []);
    }
}
