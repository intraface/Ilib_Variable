<?php
/**
 * Class for handling date time string variables
 *
 * PHP version 5
 *
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */

/**
 * Class for handling date time string variables
 *
 * @category   Ilib
 * @package    Ilib_Variable
 * @author     Sune Jensen <sune@intraface.dk>
 */
class Ilib_Variable_String_DateTime extends Ilib_Variable
{
    /**
     * Constructor
     *
     * @param string datetime in given local
     * @param string local code for local
     */
    public function __construct($date_time, $local = 'iso')
    {
        parent::__construct($date_time, $local);
    }
}
