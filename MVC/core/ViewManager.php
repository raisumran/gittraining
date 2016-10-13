<?php
/**
 * Manages the views
 */
class ViewManager
{
    private $viewfile;
    // private $data;

    /**
     * [sets the viewfile]
     * @method __construct
     * @param  [string]      $viewfile [view file to open]
     */
    function __construct($viewfile)
    {
        $this ->  viewfile = $viewfile;
        // $this ->data = $data;
    }
    /**
     * [redirects to the viewfile or default file]
     * @method render
     */

    public function render($lists) {
        set_include_path(dirname(__FILE__)."/../");
        if (file_exists('../app/views/'. $this -> viewfile. '.php')) {
            require_once ('../app/views/'. $this -> viewfile. '.php');
        } else {
            require_once ('../app/views/default/index.php');
        }
    }
}

?>
