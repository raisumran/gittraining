<?php
/**
 * is a subclass of Shape
 */
class Circ extends Shape
{
    private $radius;
    /**
     * [initiates the propert variables of shape]
     * @method __construct
     * @param  [int]      $r [radius of circle]
     */
    public function __construct($r, $waste)
    {
        $this -> radius = $r;
    }
    /**
     * [calculates and returns area of circle]
     * @method area
     * @return [int] [area of circle]
     */
    public function area()
    {
        return $this -> radius * $this -> radius * 3.14;
    }
}
