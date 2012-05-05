<?php

/**
 * Class to trim strings.
 *
 * @author markus
 */
class Trimmer {
    //put your code here
    
    /**
     *Trims given string to contain only digits.
     * @param string $value
     * @return string 
     */
    public function moneyToDecimal($value){
        $pattern = '/[^0-9,]/';
        $replacement = '';
        $trimmed = preg_replace($pattern, $replacement, $value);
        return $trimmed;
    }
}

?>
