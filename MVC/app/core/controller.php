<?php
class Controller
{
    public function model($model)
    {
        // echo $model;
        set_include_path(dirname(__FILE__)."/../");
        require_once ('../app/models/User.php');
        require_once ('../app/models/Login.php');
        return new $model();

    }
    public function view($view, $data = []) {
        set_include_path(dirname(__FILE__)."/../");
        require_once ('../app/views/'. $view. '.php');
    }

}
?>
