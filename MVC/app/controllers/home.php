<?php
/**
 * This class is the controller class for the default view and landing page
 */
class Home
{
    function __construct() {
        $this ->  index();
    }
    public function index()
    {
        $vM = new ViewManager('home/index');
        $vM -> render();
    }
}
