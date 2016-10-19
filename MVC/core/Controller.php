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
    /**
     * [sets the properties of controller class and
     * calls the action function]
     * @method __construct
     * @param  [type]      $model [description]
     */
    public function __construct() {

        $this -> controller = Request::getInstance() -> controller;
        $this -> view = new ViewManager();
        // in future if a case evolves where only particular actions
        // of a controller do not require db interaction this can be
        // changed, I am basing on the assumption(which is wrong)
        // that a controller as a whole interacts or donot interact
        // with db
        if(isset($this -> flag)) {
            if($this -> flag == True) {
                $this -> view (get_class($this) . '/index');
            }
        } else {
                $this ->  modelName = get_class($this). 'Model';
                Self::action(Request::getInstance() ->method);
        }

    }

    /**
     * [constructs the model and calls the view manager]
     * @method action
     */
    public function action($method) {
        $this -> model = $this -> model($this -> modelName);
        if($this ->  model == "error") {
            // the error property can be an array.
            // telling whether the error came, and what
            // message to display accordinlgy
            $this ->  error  =  True;
            // $this -> view('standard/index');
            // need to specify a view file
        } else {
            $params =  Request::getInstance() ->params;
            Self::$method($params);
            // will need an error on method as well
            $this -> view('standard/index');
        }
    }
    /**
     * [Inititates index action]
     * @method index
     * @param  [Model] $user [Model to access]
     * @return [type]       [description]
     */
    // **** Index and read has to be merged, just a little confusion
    // in how to deal the view part along,
    // one way can be to have two actions in controller
    // but model can changed to have both the functionalities
    // in read action,
    public function index($params) {
        // $params are being passed and individual actions
        // can decide there fate. right now the program does not have much of
        // the necessaity but params can be checked here and then the
        // course of action can be decided
        $this -> view ->  data = $this -> model ->  dbCall('index', $params);
    }
    /**
     * [Inititates read action]
     * @method read
     * @param  [Model] $user [Model to access]
     */
    public function read($params) {
        $this -> view ->  data = $this -> model ->  dbCall( $params);
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
     * [creates model object]
     * @method model
     * @param  [string] $model [name of the model to be constructed]
     * @return [Model]        [returns object of the input model class]
     */
    public function model($model)
    {
        //  whats wrong here, needs a discussion
        //
        $mf =  new ModelFactory($model);
        return $mf -> createModel();
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
