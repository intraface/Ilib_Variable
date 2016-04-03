<?php
class Ilib_Variable_String_Time_Local_Enus implements Ilib_Variable_Local
{

    /**
     * Random possible formats which should be supported
     *
     * 12:34:45
     * 12:34
     *
     * @see Ilib/Variable/Ilib_Variable_Local#convertLocalToIso()
     */
    public function convertLocalToIso($time)
    {
        $time = trim($time);
        
        if (preg_match("/^[0-2]?[0-9]:[0-5]?[0-9]:[0-5]?[0-9]$/", $time)) {
            return $time;
        } elseif (preg_match("/^[0-2]?[0-9]:[0-5]?[0-9]$/", $time)) {
            return $time.':00';
        } else {
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
