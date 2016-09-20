<?php
    require_once("Shape.php");
    require_once("Shape/Rect.php");
    /**
     * ShapeTest is a test class to test Shape Class and its subclasees
     */
class ShapeTest extends PHPUnit_Framework_TestCase
{
    /**
     * [this function confirms that area of the Shape is right]
     * @method testArea
     * @return [Bool]   [outputs whether assestions passed or not]
     */

    public function testArea()
    {
        // first assertion
        $rect = new Rect();
        $rect -> setWidth(3);
        $rect -> setHeight(6);
        $result = $rect-> area();
        $this->assertEquals(18, $result);
        //second assertion
        $rect -> setWidth(9);
        $rect -> setHeight(9);
        $result = $rect-> area();
        $this->assertEquals(81, $result);
    }
}
