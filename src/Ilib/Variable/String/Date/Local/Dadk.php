<?php

class Ilib_Variable_String_Date_Local_Dadk implements Ilib_Variable_Local
{
    
    
    public function convertLocalToIso($date)
    {
        $day            = "([0-3]?[0-9])";
        $month          = "([0-1]?[0-9])";
        $year           = "([0-9][0-9][0-9][0-9]|[0-9]?[0-9])";
        $date_separator = "(-|\.|/| )";
        
        $date = trim($date);
        
        if(ereg("^".$day.$date_separator.$month.$date_separator.$year.'$', $date, $parts)) {
            return $parts[5]."-".$parts[3]."-".$parts[1];
        } elseif(ereg("^".$day.$date_separator.$month."$", $date, $parts)) {
            return date('Y').'-'.$parts[3]."-".$parts[1];
        } else {
            /**
             * Is this correct behaviour? Returns today when unable to parse!
             */
            return date('Y-m-d');
        }
    }
    
    public function convertIsoToLocal($date)
    {
        return date('d-m-Y', strtotime($date));
    }
    
}

?>
