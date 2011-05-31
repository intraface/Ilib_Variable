<?php
require_once 'config.test.php';
set_include_path('../src/' . PATH_SEPARATOR . get_include_path());
require_once 'Ilib/ClassLoader.php';

class VariableStringDateTimeTest extends PHPUnit_Framework_TestCase
{
    function testGetIsoAsDadk()
    {
        $float = new Ilib_Variable_String_DateTime('2008-12-23 22:45:56');
        $this->assertEquals('23-12-2008 22:45:56', $float->getAsLocal('da_dk'));
    }
    
    function testGetIsoAsEnus()
    {
        $float = new Ilib_Variable_String_DateTime('2008-12-23 22:45:56');
        $this->assertEquals('2008-12-23 22:45:56', $float->getAsLocal('en_us'));
    }
    
    function testGetDadkAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008 22:45:56', 'da_dk');
        $this->assertEquals('2008-12-23 22:45:56', $datetime->getAsIso());
    }
    
    function testGetDadkWithNoYearAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12 22:45:56', 'da_dk');
        $this->assertEquals(date('Y').'-12-23 22:45:56', $datetime->getAsIso());
    }
    
    function testGetDadkWithSpaceBeforeYearAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23/12 2008 22:45:56', 'da_dk');
        $this->assertEquals('2008-12-23 22:45:56', $datetime->getAsIso());
    }
    
    function testGetDadkWithNoTimeAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008', 'da_dk');
        $this->assertEquals('2008-12-23 '.date('H:i:s'), $datetime->getAsIso());
    }
    
    function testGetDadkWithNoDateAsIso() 
    {
        $datetime = new Ilib_Variable_String_DateTime('22:45:56', 'da_dk');
        $this->assertEquals(date('Y-m-d').' 22:45:56', $datetime->getAsIso());
    }
    
    function testGetRawDadk() 
    {
        $datetime = new Ilib_Variable_String_DateTime('23-12-2008 22:45:56', 'da_dk');
        $this->assertEquals('23-12-2008 22:45:56', $datetime->getRaw());
        
    }
}

