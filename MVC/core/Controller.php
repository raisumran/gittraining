<?php
/**
 * This class acts as base controller and every controller extends this class
 * has methods to construct model
 */
class Controller
{
    protected $controller;
    protected $modelName;
    protected $method;
    protected $params;
    private $model;
    /**
     * [sets the properties of controller class and
     * calls the action function]
     * @method __construct
     * @param  [type]      $model [description]
     */
    public function __construct() {

        $this -> controller = Request::getInstance() -> controller;
        $this ->  modelName = get_class($this). 'Model';
        $this -> method = Request::getInstance() ->method;
        $this -> params = Request::getInstance() ->params;
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
        $mf =  new ModelFactory($model, $this -> params, $this -> controller);
        return $mf -> createModel($this ->  params, Request::getInstance() -> controller);
    }
    /**
     * [constructs the model and calls the view manager]
     * @method action
     */
    public function action() {
        $this -> model = $this -> model($this -> modelName);
        $method = $this -> method;
        $lists = Self::$method();
        $this ->  view($lists, 'standard');

    }
    /**
     * [Inititates index action]
     * @method index
     * @param  [Model] $user [Model to access]
     * @return [type]       [description]
     */

    public function index() {
        return $this -> model ->  dbCall('index');
    }
    /**
     * [Inititates create action]
     * @method create
     * @param  [Model] $user [Model to access]
     */
    public function create() {
        return $this -> model ->  dbCall('create');
    }
    /**
     * [Inititates update action]
     * @method update
     * @param  [Model] $user [Model to access]
     */
    public function update() {
        return $this -> model ->  dbCall('update');
    }
    /**
     * [Inititates delete action]
     * @method delete
     * @param  [Model] $user [Model to access]
     */
    public function delete() {
        return $this -> model ->  dbCall('delete');
    }
    /**
     * [Inititates read action]
     * @method read
     * @param  [Model] $user [Model to access]
     */
    public function read() {
        return $this -> model ->  dbCall('read');
    }
    /**
     * [calls the view for the controller and method]
     * @method view
     * @param  [array] $lists [output to display ]
     * @param  [string ] $view  [viewfile to call]
     */

    public function view($lists, $view) {
        $vM = new ViewManager($view . '/'. Request::getInstance() -> method);
        $vM -> render($lists);
    }
}
?>
