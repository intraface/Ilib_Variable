<?php
set_include_path(dirname(__FILE__) . '/../src/' . PATH_SEPARATOR . get_include_path());
require_once 'Ilib/ClassLoader.php';

class VariableFloatTest extends PHPUnit_Framework_TestCase
{
    function testGetIsoAsDadk()
    {
        $float = new Ilib_Variable_Float(23.45);
        $this->assertEquals('23,45', $float->getAsLocal('da_dk'));
    }
    
    function testGetIsoAsEnus()
    {
        $float = new Ilib_Variable_Float(23.45);
        $this->assertEquals('23.45', $float->getAsLocal('en_us'));
    }
    
    function testGetIsoAsDadkWithDecimalsOnInteger()
    {
        $float = new Ilib_Variable_Float(23);
        $this->assertEquals('23,00', $float->getAsLocal('da_dk', 2));
    }
    
    function testGetDadkAsIso() 
    {
        $float = new Ilib_Variable_Float('23,45', 'da_dk');
        $this->assertEquals(23.45, $float->getAsIso());
    }
    
    function testGetEnusAsIso() 
    {
        $float = new Ilib_Variable_Float('23.45', 'en_us');
        $this->assertEquals(23.45, $float->getAsIso());
    }
    
    function testGetRawDadk() 
    {
        $float = new Ilib_Variable_Float('23,45', 'da_dk');
        $this->assertEquals('23,45', $float->getRaw());
    }
}

