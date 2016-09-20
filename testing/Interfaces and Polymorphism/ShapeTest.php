<?php
    require_once("Shape.php");
    require_once("Rect.php");
    require_once("Circ.php");
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
        $rect = new Rect(12, 3);
        $result = $rect-> area();
        $this->assertEquals(36, $result);
        //second assertion
        $circ = new Circ(3);
        $result = $circ-> area();
        $this->assertEquals(28.26, $result);
    }
}
