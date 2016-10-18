<?php
/**
 * This class acts as base controller and every controller extends this class
 * has methods to construct model
 */
class Controller
{
    protected $controller;
    // stores a string
    protected $modelName;
    // Stores the Child object of MODEL
    private $model;
    protected $view;
    protected $flag;
    /**
     * [sets the properties of controller class and
     * calls the action function]
     * @method __construct
     * @param  [type]      $model [description]
     */
    public function __construct() {

        $this -> controller = Request::getInstance() -> controller;
        $this -> view = new ViewManager();
        if($this -> flag == True) {
            // code repition, need to put it in a function
            $this -> view (get_class($this) . '/index');
        } else {
            $this ->  modelName = get_class($this). 'Model';
            Self::action(Request::getInstance() ->method);
        }
    }
    /**
     * [creates model object]
     * @method model
     * @param  [string] $model [name of the model to be constructed]
     * @return [Model]        [returns object of the input model class]
     */
    public function model($model)
    {
        //  whats wrong here,  I should not be calling this statically for sure
        //
        $mf =  new ModelFactory($model);
        return $mf -> createModel();
    }
    /**
     * [constructs the model and calls the view manager]
     * @method action
     */
    public function action($method) {
        $this -> model = $this -> model($this -> modelName);
        $params =  Request::getInstance() ->params;
        Self::$method($params);
        $this -> view('standard/index');

    }
    /**
     * [Inititates index action]
     * @method index
     * @param  [Model] $user [Model to access]
     * @return [type]       [description]
     */

    public function index($params) {
        $this -> view ->  data = $this -> model ->  dbCall('index', $params);
    }
    /**
     * [Inititates create action]
     * @method create
     * @param  [Model] $user [Model to access]
     */
    public function create($params) {
        $this -> view ->  data =  $this -> model ->  dbCall( $params);
    }
    /**
     * [Inititates update action]
     * @method update
     * @param  [Model] $user [Model to access]
     */
    public function update($params) {
        $this -> view ->  data =  $this -> model ->  dbCall($params);
    }
    /**
     * [Inititates delete action]
     * @method delete
     * @param  [Model] $user [Model to access]
     */
    public function delete($params) {
        $this -> view ->  data =  $this -> model ->  dbCall( $params);
    }
    /**
     * [Inititates read action]
     * @method read
     * @param  [Model] $user [Model to access]
     */
    public function read() {
        $this -> view ->  data = $this -> model ->  dbCall( $params);
    }
    /**
     * [calls the view for the controller and method]
     * @method view
     * @param  [array] $lists [output to display ]
     * @param  [string ] $view  [viewfile to call]
     */
     // need to fix it according to method name as well
    public function view($fileName) {
        $this -> view -> viewfile  = $fileName;
        $this ->  view ->  render();
    }
}
?>
