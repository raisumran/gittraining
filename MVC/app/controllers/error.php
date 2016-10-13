<?php
/**
 * This class is the controller class for the default view and landing page
 */
class Error extends Controller
{
    /**
     * [costructs the home class and directs to index function]
     * @method __construct
     */
     function __construct() {
         parent::view([], 'home');
     }
    /**
     * [calls the view for home page]
     * @method index
     */

}
