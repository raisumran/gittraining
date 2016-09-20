<?php
/**
 * Rect class is subclass of Shape
 */
class Rect implements Shape
{
    private $length;
    private $width;
    /**
     * [initiates the properties of Rectangle Shape]
     * @method __construct
     * @param  [int]      $l [length of rectangle]
     * @param  [type]      $w [length of rectangle]
     */
    public function __construct($l, $w)
    {
        $this -> length = $l;
        $this -> width = $w;
    }
    /**
     * [calculates area of triangle]
     * @method area
     * @return [int] [area of rectangle]
     */
    public function area()
    {
        return $this -> length * $this -> width;
    }
}
