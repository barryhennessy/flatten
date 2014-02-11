<?php
/**
 * Tests the flattener class' multidimensional array flattening behavior
 *
 * @author Barry Hennessy <barryhenn@gmail.com>
 */
class TestFlattener extends PHPUnit_Framework_TestCase
{
    public function testFlattensSingleArrayReturnsIdentical()
    {
        $toFlatten = array(0, 1, 2, 9, 8, 7);
        $flat = Flattener::flatten($toFlatten);

        $this->assertSame($flat, $toFlatten);
    }


    public function testFlattenEmptyArrayReturnsEmptyArray()
    {
        $toFlatten = array();
        $flat = Flattener::flatten($toFlatten);

        $this->assertSame($flat, array());
    }


    public function testFlattenNonArrayThrowsError()
    {
        $this->setExpectedException("PHPUnit_Framework_Error");
        $toFlatten = "Not an array";
        $flat = Flattener::flatten($toFlatten);
    }


    public function testFlatten2DArray()
    {
        $toFlatten = array(1, 2, array(3), array(4, 5));
        $flat = Flattener::flatten($toFlatten);

        $this->assertSame($flat, array(1, 2, 3, 4, 5));
    }


    public function testFlatten2DArrayWithEmpty()
    {
        $toFlatten = array(1, 2, array(), array(4, 5));
        $flat = Flattener::flatten($toFlatten);

        $this->assertSame($flat, array(1, 2, 4, 5));
    }


    public function testNonIntValueThrowsUnexpectedValue()
    {
        $this->setExpectedException("UnexpectedValueException");

        $toFlatten = array(1, 2, array("three"), array(4, 5));
        $flat = Flattener::flatten($toFlatten);
    }
}