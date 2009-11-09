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
        
        if($local == 'iso') {
            $this->variable_iso = $variable;
        }
        else {
            $class_name = $this->getLocalClassName($local);
            $local_float = new $class_name; 
            $this->variable_iso = $local_float->convertLocalToIso($variable);
        }   
    }
    
    /**
     * Returns the variable in local
     * DEPRECATED! Use getAsLocale() instead. 
     * 
     * @param string local the local to return the float in
     * @return mixed variable in given local
     */
    public function getAsLocal($local)
    {
        return $this->getAsLocal($local);
    }
    
    /**
     * Returns the variable in locale
     * Better named than getAsLocal
     * 
     * @param string local the local to return the float in
     * @return mixed variable in given local
     */
    public function getASLocale($local)
    {
        $class_name = $this->getLocalClassName($local);
        $local_float = new $class_name; 
        return $local_float->convertIsoToLocal($this->variable_iso);
    }
    
    /**
     * Returns the variable in iso
     * 
     * @param string local the local to return the float in
     * @return float variable in given iso
     */
    public function getAsIso()
    {
        return $this->variable_iso;
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
    
    protected function getLocalClassName($local) 
    {
        $class_name = get_class($this).'_Local_'.ucfirst(strtolower(str_replace('_', '', $local)));
        if(!class_exists($class_name)) {
            throw new Exception('Unsupported local '.$local);
        }
        return $class_name;
    }
}
