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
class Ilib_Variable_Float
{
    /**
     * @var mixed float in local
     */
    private $float;
    
    /**
     * @var float float in iso standard
     */
    private $float_iso;
    
    /**
     * @var string local used in class
     */
    private $local;
    
    /**
     * Constructor
     * 
     * @param mixed float in local
     * @param string local code for local
     */
    public function __construct($float, $local = 'iso')
    {
        $this->float = $float;
        $this->local = $local;
        $this->float_iso = $this->convertToIso($local);
    }
    
    /**
     * Returns the flaot in local
     * 
     * @param string local the local to return the float in
     * @return mixed float in given local
     */
    public function get($local = 'iso')
    {
        return $this->convertToLocal($local);
    }
    
    /**
     * Returns the float in the input format
     * 
     * @return mixed float in input format
     */
    public function getRaw()
    {
        return $this->float;
    }
    
    /**
     * Convert any local float to iso float 
     * 
     * @param string local which the float is given in
     * @return float iso float
     */
    private function convertToIso($local)
    {
        if($local == 'iso') {
            return $this->float;
        }
        
        $class_name = 'Ilib_Variable_Float_Local_'.ucfirst(strtolower(str_replace('_', '', $local)));
        if(!class_exists($class_name)) {
            throw new Exception('Unsupported local '.$local);
        }
        $local_float = new $class_name; 
        
        return $local_float->convertLocalToIso($this->float);
    }
    
    /**
     * Converts a iso float to a local float
     * 
     * @param string local local to return the float in
     * @return mixed float in given local
     */
    private function convertToLocal($local)
    {
        if($local == 'iso') {
            return $this->float_iso;
        }
        
        $class_name = 'Ilib_Variable_Float_Local_'.ucfirst(strtolower(str_replace('_', '', $local)));
        if(!class_exists($class_name)) {
            throw new Exception('Unsupported local '.$local);
        }
        $local_float = new $class_name; 
        
        return $local_float->convertIsoToLocal($this->float);
    }
    
}
