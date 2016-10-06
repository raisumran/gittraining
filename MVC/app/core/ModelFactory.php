<?php
/**
 *  constructs models
 */
class ModelFactory
{
    function __construct($model)
    {
        new $model();
    }
}

?>
