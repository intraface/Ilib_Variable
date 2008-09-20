<?php
/**
 * Class for handling variables of the type float
 *
 * PHP version 5
 *
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */

/**
 * Class for handling variables of the type float
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */
class Ilib_Variable_Float extends Ilib_Variable
{
    
    /**
     * Constructor
     * 
     * @param mixed float in local
     * @param string local code for local
     */
    public function __construct($float, $local = 'iso')
    {
        parent::__construct($float, $local);
    }
    
}
