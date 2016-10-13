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
        return new $this -> model();
    }
}

?>
