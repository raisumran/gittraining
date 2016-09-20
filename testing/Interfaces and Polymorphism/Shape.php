<?php
    require_once("Rect.php");
    require_once("Circ.php");
    /**
     * This is a super class to Rect and Circ Class
     * Defines a template for subclasses
     */
interface Shape
{
    /**
     * [defines a template function for rect and Cric class area functions]
     */
    public function area();
}
/**
 * [calculates the price of an area]
 * @method cost
 * @param  Shape  $shape [can be either Rect or Circ]
 * @return [int]        [cost of the input shape]
 */
function cost(Shape $shape)
{
    return $shape -> area() * 2.5;
}
