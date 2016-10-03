<?php
/**
 *
 */
class ModelFactory
{

    function __construct()
    {
        # code...
    }
    function createModel($model) {
        return new $model();

    }

}

?>
