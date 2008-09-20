<?php
/**
 * Class for handling time string variables
 *
 * PHP version 5
 *
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */

/**
 * Class for handling time string variables
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */
class Ilib_Variable_String_Time extends Ilib_Variable
{
    
    /**
     * Constructor
     * 
     * @param string time in given local
     * @param string local code for local
     */
    public function __construct($time, $local = 'iso')
    {
        parent::__construct($time, $local);
    }    
}
