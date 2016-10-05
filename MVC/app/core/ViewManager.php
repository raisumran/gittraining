<?php
/**
 *
 */
class ViewManager
{
    public $viewfile;

    function __construct($viewfile)
    {
        $this ->  viewfile = $viewfile;
    }
    public function render() {
        set_include_path(dirname(__FILE__)."/../");
        if (file_exists('../app/views/'. $this -> viewfile. '.php')) {
            require_once ('../app/views/'. $this -> viewfile. '.php');
        } else {
            require_once ('../app/views/dashboard/index.php');
        }
    }
}

?>
