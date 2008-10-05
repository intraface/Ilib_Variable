<?php
/**
 * Abstract for handling variables
 *
 * PHP version 5
 *
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */

/**
 * Abstract for handling variables
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */
abstract class Ilib_Variable
{
    /**
     * @var mixed variable in local
     */
    private $variable;
    
    /**
     * @var mixed varible in iso standard
     */
    private $variable_iso;
    
    /**
     * @var string local used in class
     */
    private $local;
    
    /**
     * Constructor
     * 
     * @param mixed variable in given local
     * @param string local code for local
     */
    public function __construct($variable, $local = 'iso')
    {
        $this->variable = $variable;
        $this->local = $local;
        $this->variable_iso = $this->convertLocalToIso($variable, $local);
    }
    
    /**
     * Returns the variable in local
     * 
     * @param string local the local to return the float in
     * @return mixed variable in given local
     */
    public function getAsLocal($local)
    {
        return $this->convertIsoToLocal($this->variable_iso, $local);
    }
    
    /**
     * Returns the variable in iso
     * 
     * @param string local the local to return the float in
     * @return float variable in given iso
     */
    public function getAsIso()
    {
        return $this->convertIsoToLocal($this->variable_iso, 'iso');
    }
    
    /**
     * Returns the variable in the input format
     * 
     * @return mixed variable in input format
     */
    public function getRaw()
    {
        return $this->variable;
    }
    
    /**
     * Convert any local variable to iso float 
     * 
     * @param string local which the float is given in
     * @return mixed variable in iso standard
     */
    protected function convertLocalToIso($variable, $local)
    {
        if ($local == 'iso') {
            return $variable;
        }
        
        $class_name = get_class($this).'_Local_'.ucfirst(strtolower(str_replace('_', '', $local)));
        if (!class_exists($class_name)) {
            throw new Exception('Unsupported local '.$local);
        }
        $local_float = new $class_name; 
        return $local_float->convertLocalToIso($variable);
    }
    
    
    /**
     * Converts a iso variable to a local float
     * 
     * @param string local local to return the float in
     * @return mixed variable in given local
     */
    protected function convertIsoToLocal($variable, $local) 
    {
        if ($local == 'iso') {
            return $variable;
        }
        
        $class_name = get_class($this).'_Local_'.ucfirst(strtolower(str_replace('_', '', $local)));
        if (!class_exists($class_name)) {
            throw new Exception('Unsupported local '.$local);
        }
        $local_float = new $class_name; 
        
        return $local_float->convertIsoToLocal($variable);
    } 
}
