<?php
/**
 * This class acts as base controller and every controller extends this class
 * has methods to construct model
 */
class Controller
{
    protected $controller;
    protected $model;
    /**
     * [sets the properties of controller class and
     * calls the action function]
     * @method __construct
     * @param  [type]      $model [description]
     */
    public function __construct($model) {
        $this -> controller = Request::getInstance() -> controller;
        $this ->  model = $model;
        Self::action();
    }
    /**
     * [creates model object]
     * @method model
     * @param  [string] $model [name of the model to be constructed]
     * @return [Model]        [returns object of the input model class]
     */
    public function model($model)
    {
        set_include_path(dirname(__FILE__)."/../");
        $mF =  new ModelFactory($model);
    }
    /**
     * [constructs the model and calls the view manager]
     * @method action
     */
    public function action() {
        $user = $this -> model($this -> model);
        $vM = new ViewManager($this -> controller . '/'. Request::getInstance() -> method);
        $vM -> render();
    }
}
?>
