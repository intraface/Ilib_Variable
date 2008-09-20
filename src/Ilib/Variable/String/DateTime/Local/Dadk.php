<?php

class Ilib_Variable_String_DateTime_Local_Dadk implements Ilib_Variable_Local
{
    
    
    public function convertLocalToIso($date_time)
    {
        /**
         * Random possible formats which should be supported
         * 
         * 23/12/2008 12:34:45
         * 23-12-2008 12:34
         * 23/12 2008 12:34:45
         * 23/12 12:34
         * 23-12-2008 2:34:45
         * 23/12 2008
         * 12:34 (?)
         */
        
        $parts = explode(' ', $date_time);
        
        if(count($parts) == 0) {
            return date('Y-m-d H:i:s');
        }
        
        // removes any empty entities
        $parts = array_filter($parts, create_function('$value', 'return ($value != "");'));
        // organize keys again
        $parts = array_values($parts);
        // if there is a ':' in the last part it is probably date
        if(false ==! strstr($parts[count($parts)-1], ':')) {
            $time_object = new Ilib_Variable_String_Time_Local_Dadk;
            $time = $time_object->convertLocalToIso($parts[count($parts)-1]);
            // remove the time part
            array_pop($parts);
        } else {
            $time = date('H:i:s');
        }
        
        $date_object = new Ilib_Variable_String_Date_Local_Dadk;
        $date = $date_object->convertLocalToIso(implode(' ', $parts));
        return $date.' '.$time;
    }
    
    public function convertIsoToLocal($date_time)
    {
        
        $parts = explode(' ', $date_time);
        
        $date_object = new Ilib_Variable_String_Date_Local_Dadk;
        $date = $date_object->convertIsoToLocal($parts[0]);
        
        $time_object = new Ilib_Variable_String_Time_Local_Dadk;
        $time = $time_object->convertIsoToLocal($parts[1]);
        
        return $date.' '.$time;
    }
    
}

?>
