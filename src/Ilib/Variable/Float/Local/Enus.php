<?php
class Ilib_Variable_Float_Local_Enus implements Ilib_Variable_Local
{

    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertLocalToIso()
     */
    public function convertLocalToIso($float)
    {
        return $float;
    }

    /**
     * @see Ilib/Variable/Ilib_Variable_Local#convertIsoToLocal()
     */
    public function convertIsoToLocal($float, $precision = NULL)
    {
        $float_string = (string)$float;

        if (is_int($precision)) {
            $decimals = $precision;
        } elseif(strpos($float_string, '.') !== false) {
            $decimals = strlen(substr($float_string, strpos($float_string, '.')+1));
        } else {
            $decimals = 0;
        }

        return number_format($float, $decimals, '.', ',');
    }

}
