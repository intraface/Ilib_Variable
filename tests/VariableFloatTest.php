<?php
require_once 'config.test.php';
require_once 'Ilib/ClassLoader.php';
require_once 'PHPUnit/Framework.php';

class VariableFloatTest extends PHPUnit_Framework_TestCase
{
    function testGetIsoAsDadk()
    {
        $float = new Ilib_Variable_Float(23.45);
        $this->assertEquals('23,45', $float->get('da_dk'));
    }
    
    function testGetDadkAsIso() 
    {
        $float = new Ilib_Variable_Float('23,45', 'da_dk');
        $this->assertEquals(23.45, $float->get());
    }
    
    function testGetRawDadk() 
    {
        $float = new Ilib_Variable_Float('23,45', 'da_dk');
        $this->assertEquals('23,45', $float->getRaw());
    }

}

?>