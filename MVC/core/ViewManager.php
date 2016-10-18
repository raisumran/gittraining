<?php
/**
 * Manages the views
 */
class ViewManager
{
    public $viewfile;
    public $error;
    public $warning;
    public $data;
    // private $data;

    /**
     * [sets the viewfile]
     * @method __construct
     * @param  [string]      $viewfile [view file to open]
     */
    function __construct()
    {
        //  I think I can work withuot the constructor but that would mean
        //
        $this ->data = array();
    }
    /**
     * [redirects to the viewfile or default file]
     * @method render
     */

    public function render() {
        $lists =  $this -> data;
        set_include_path(dirname(__FILE__)."/../");
        if (file_exists('../app/views/'. $this -> viewfile. '.php')) {
            require_once ('../app/views/'. $this -> viewfile. '.php');
        } else {
            require_once ('../app/views/default/index.php');
        }
    }
}

?>
