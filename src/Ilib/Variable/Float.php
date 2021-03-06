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
     *
     * @return void
     */
    public function __construct($float, $local = 'iso')
    {
        parent::__construct($float, $local);
    }

    /**
     * Returns the variable in iso
     *
     * @param string local the local to return the float in
     *
     * @return float variable in given iso
     */
    public function getAsIso($precision = null)
    {
        if (is_int($precision)) {
            return round(parent::getAsIso(), $precision);
        } else {
            return parent::getAsIso();
        }
    }

    /**
     * Returns the variable in local
     * @deprecated Use getAsLocale() instead.
     *
     * @param string local the local to return the float in
     * @param integer $precision the precision of the returned float.
     *
     * @return mixed variable in given local
     */
    public function getAsLocal($local, $precision = null)
    {
        return $this->getASLocale($local, $precision);
    }

    /**
     * Returns the variable in local
     *
     * @param string local the local to return the float in
     * @param integer $precision the precision of the returned float.
     *
     * @return mixed variable in given local
     */
    public function getAsLocale($local, $precision = null)
    {
        $class_name = $this->getLocalClassName($local);
        $local_float = new $class_name;
        return $local_float->convertIsoToLocal($this->getAsIso(), $precision);
    }
}
