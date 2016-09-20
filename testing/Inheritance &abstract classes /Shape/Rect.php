<?php
    /**
     * Rect class describes the properties of rectangle and is a subclass of SHape
     */
class Rect extends Shape
{
    /**
    * [Calculates area of a rectangle @inheritDoc]
    * @method area
    * @return [int] [area of the rectangle]
    */

    public function area()
    {
        return $this -> width * $this-> height;
    }
}
