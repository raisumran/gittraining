<?php
    /**
     * Shape class is a superclass
     * sub classes includeRect Class
     */
abstract class Shape
{
    // Declaring protected variable to allow access from sub class
    protected $width;
    protected $height;
    protected $base;
    /**
     * [this calculates the area of the shape, defined in every sub class]
     * @method area
     * @return [int] [area of the shape]
     */
    abstract public function area();
    /**
     * [allocates value to_width variable]
     * @method setWidth
     * @param  [int]   $w [width of the shape]
     */
    public function setWidth($w)
    {
        $this -> width = $w;
    }
    /**
     * [allocates value to_height variable]
     * @method setHeight
     * @param  [int]    $l [height of the shape]
     */
    public function setHeight($l)
    {
        $this-> height = $l;
    }
    /**
     * [allocates value to_base variable]
     * @method setBase
     * @param  [int]  $b [base of the shape]
     */
    public function setBase($b)
    {
        $this -> base = $b;
    }
}
