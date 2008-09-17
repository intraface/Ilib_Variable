<?php

class Ilib_Variable_Float_Local_Dadk implements Ilib_Variable_Float_Local
{
    
    
    public function convertLocalToIso($float)
    {
        $float = str_replace('.', '', $float);
        $float = str_replace(',', '.', $float);
        
        return (float)$float;
    }
    
    public function convertIsoToLocal($float)
    {
        $float_string = (string)$float;
        
        if(strpos($float_string, '.') !== false) {
            $decimals = strlen(substr($float_string, strpos($float_string, '.')+1));
        }
        else {
            $decimals = 0;
        }
        
        return number_format($float, $decimals, ',', '.');
    }
    
}

?>
