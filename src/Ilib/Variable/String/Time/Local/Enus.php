<?php

class Ilib_Variable_String_Time_Local_Dadk implements Ilib_Variable_Local
{
    
    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertLocalToIso()
     */
    public function convertLocalToIso($time)
    {
        /**
         * Random possible formats which should be supported
         * 
         * 12:34:45
         * 12:34
         */
        
        $time = trim($time);
        
        if(ereg("^[0-2]?[0-9]:[0-5]?[0-9]:[0-5]?[0-9]$", $time)) {
            return $time;
        }
        elseif(ereg("^[0-2]?[0-9]:[0-5]?[0-9]$", $time)) {
            return $time.':00';
        }
        else {
            return date('H:i:s');
        }
    }
    
    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertIsoToLocal()
     */
    public function convertIsoToLocal($time)
    {
        return $time;
    }
    
}
