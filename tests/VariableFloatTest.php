<?php
require_once 'config.test.php';
require_once 'Ilib/ClassLoader.php';
require_once 'PHPUnit/Framework.php';

class VariableFloatTest extends PHPUnit_Framework_TestCase
{
    function testGetIsoAsDadk()
    {
        $float = new Ilib_Variable_Float(23.45);
        $this->assertEquals('23,45', $float->getAsLocal('da_dk'));
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
    
    function testGetRawDadk() 
    {
        $float = new Ilib_Variable_Float('23,45', 'da_dk');
        $this->assertEquals('23,45', $float->getRaw());
    }

}

?>