<?php
/**
 * This class is the controller class for the default view and landing page
 */
class Home
{
    /**
     * [costructs the home class and directs to index function]
     * @method __construct
     */
    function __construct() {
        $this ->  index();
    }
    /**
     * [calls the view for home page]
     * @method index
     */

    public function index()
    {
        $vM = new ViewManager('home/index');
        $vM -> render();
    }
}
