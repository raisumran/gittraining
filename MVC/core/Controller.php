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
    public function __construct() {
        // echo "called";
        // foreach (array_keys($_POST) as $field)
        // {
        //     echo $_POST[$field];
        // }
        $this -> controller = Request::getInstance() -> controller;
        $this ->  model = get_class($this). 'Model';
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
        $mf =  new ModelFactory($model);
        return $mf -> createModel();
    }
    /**
     * [constructs the model and calls the view manager]
     * @method action
     */
    public function action() {
        $user = $this -> model($this -> model);
        $dbQuery =  new DBquery(Request::getInstance() -> controller, $user -> columnArray, $user ->  relationships);
        $query = $dbQuery -> dbCall($user -> relationships);
        $lists = array();
        $lists[0] = $user -> columnArray;
        $lists[1] = $user ->  db -> returnQueryData($query);
        $lists[1] = $user ->  orm($lists);
        $this ->  view($lists, 'standard');
    }
    public function view($lists, $view) {
        $vM = new ViewManager($view . '/'. Request::getInstance() -> method);
        $vM -> render($lists);
    }
}
?>
