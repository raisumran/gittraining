<?php
/**
 * This class is the controller class for the default view and landing page
 */
class Home extends Controller
{
    public function index()
    {
        $vM = new ViewManager('home/index');
        $vM -> render();
        // $this -> view('home/index', []);
    }
}
