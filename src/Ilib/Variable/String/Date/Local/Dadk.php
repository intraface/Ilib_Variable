<?php
class Ilib_Variable_String_Date_Local_Dadk implements Ilib_Variable_Local
{
    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertLocalToIso()
     */
    public function convertLocalToIso($date)
    {
        $day            = "([0-3]?[0-9])";
        $month          = "([0-1]?[0-9])";
        $year           = "([0-9][0-9][0-9][0-9]|[0-9]?[0-9])";
        $date_separator = "[-\.\/\s]";
        
        $date = trim($date);
        
        if (preg_match("/^".$day.$date_separator.$month.$date_separator.$year.'$/', $date, $parts)) {
            return $parts[3]."-".$parts[2]."-".$parts[1];
        } elseif (preg_match("/^".$day.$date_separator.$month."$/", $date, $parts)) {
            return date('Y').'-'.$parts[2]."-".$parts[1];
        } else {
            // @todo Is this correct behaviour? Returns today when unable to parse!
            return date('Y-m-d');
        }
    }
    
    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertIsoToLocal()
     */
    public function convertIsoToLocal($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
