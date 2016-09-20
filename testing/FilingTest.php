<?php
require_once("Filing.php");
/**
 * this FilingTest is a test class to test Filing Class
 */
class FilingTest extends PHPUnit_Framework_TestCase
{
    /**
     * [test both read and write function]
     * @method testfWritefRead
     * @return [Bool]          [tells if the test passed or not]
     */
    public function testfWritefRead()
    {
        $log = new Filing();
        $log -> fWrite('sam.txt', "my name is sumran");
        $result =  $log -> fRead('sam.txt');
        $this->assertEquals("my name is sumran", $result);
    }
}
