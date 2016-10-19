<?php
/**
 *  constructs models
 */
class ModelFactory
{
    private $model;
    function __construct($model)
    {
        $this ->  model = $model;
    }
    public function createModel() {
        if (file_exists('../app/models/'.$this -> model. '.php')) {
            return new $this -> model();
        }else {
            // needs to send an error message as well
            return "error";
        }
    }
}

?>
