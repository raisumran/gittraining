<?php
/**
 * This class acts as base controller and every controller extends this class
 * has methods to construct model and view
 */
class Controller
{
    /**
     * [creates model object]
     * @method model
     * @param  [string] $model [name of the model to be constructed]
     * @return [Model]        [returns object of the input model class]
     */
    public function model($model)
    {
        // echo $model;
        set_include_path(dirname(__FILE__)."/../");
        require_once ('../app/models/' .$model. '.php');
        return new $model();
    }
    /**
     * [view description]
     * @method view
     * @param  [string] $view [view to display]
     * @param  [array] $data [any data to be passes]
     */
    public function view($view, $data = []) {
        set_include_path(dirname(__FILE__)."/../");
        require_once ('../app/views/'. $view. '.php');
    }
}
?>
