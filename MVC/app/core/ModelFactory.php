<?php
/**
 *  constructs models
 */
class ModelFactory
{

    function __construct($model)
    {
        return new $model();
    }
}

?>
