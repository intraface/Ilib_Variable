<?php
/**
 * Class for handling date string variables
 *
 * PHP version 5
 *
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */

/**
 * Class for handling date string variables
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */
class Ilib_Variable_String_Date extends Ilib_Variable
{
    /**
     * Constructor
     *
     * @param string date in given local
     * @param string local code for local
     */
    public function __construct($date, $local = 'iso')
    {
        parent::__construct($date, $local);
    }
}
