<?php
require_once 'config.test.php';
require_once 'Ilib/ClassLoader.php';
require_once 'PHPUnit/Framework.php';

class VariableStringDateTimeTest extends PHPUnit_Framework_TestCase
{
    
    function testGetIsoAsDadk()
    {
        $float = new Ilib_Variable_String_DateTime('2008-12-23 22:45:56');
        $this->assertEquals('23-12-2008 22:45:56', $float->get('da_dk'));
    }
    
    function testGetDadkAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008 22:45:56', 'da_dk');
        $this->assertEquals('2008-12-23 22:45:56', $datetime->get());
    }
    
    function testGetDadkWithNoYearAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12 22:45:56', 'da_dk');
        $this->assertEquals(date('Y').'-12-23 22:45:56', $datetime->get());
    }
    
    function testGetDadkWithSpaceBeforeYearAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23/12 2008 22:45:56', 'da_dk');
        $this->assertEquals('2008-12-23 22:45:56', $datetime->get());
    }
    
    function testGetDadkWithNoTimeAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008', 'da_dk');
        $this->assertEquals('2008-12-23 '.date('H:i:s'), $datetime->get());
    }
    
    function testGetDadkWithNoDateAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('22:45:56', 'da_dk');
        $this->assertEquals(date('Y-m-d').' 22:45:56', $datetime->get());
    }
    
    
    function testGetRawDadk() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008 22:45:56', 'da_dk');
        $this->assertEquals('23-12-2008 22:45:56', $datetime->getRaw());
        
    }

}

?>