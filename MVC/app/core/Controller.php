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
        set_include_path(dirname(__FILE__)."/../");
        $mF =  new ModelFactory();
        $ret = $mF -> createModel($model);
        return $ret;
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
