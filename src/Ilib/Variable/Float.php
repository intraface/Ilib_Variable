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
    
    public function getAsIso($precision = NULL)
    {
        
        if(is_int($precision)) {
            return round(parent::getAsIso(), $precision);
        }
        else {
            return parent::getAsIso();
        }
    }
    
    public function getAsLocal($local, $precision = NULL)
    {
        $class_name = $this->getLocalClassName($local);
        $local_float = new $class_name; 
        return $local_float->convertIsoToLocal($this->getAsIso(), $precision);
    }
    
}
