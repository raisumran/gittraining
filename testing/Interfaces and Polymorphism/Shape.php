<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("Rect.php");
    require_once("Circ.php");
    /**
     * This is a super class to Rect and Circ Class
     * Defines a template for subclasses
     */
class Shape
{
    private $type;
    /**
     * [constructs a sub class depending upong the first argument]
     * @method __construct
     * @param  [char]      $a [decides which sub class constructor to be called]
     * @param  [int]      $b [dimension of the sub class]
     * @param  [int]      $c [dimension of the subclass, can be -1 for some cases]
     */
    public function __construct ($a, $b, $c)
    {
        $this -> type = new $a($b, $c);
    }
    /**
     * [calls the area function of concerned sub class]
     * @method area
     * @return [int] [area of the shape]
     */
    public function area()
    {
        return $this -> type ->  area();
    }
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
$lame = new Shape('Rect', 12, 3);
var_dump($lame);
