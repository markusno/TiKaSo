<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trimmer
 *
 * @author markus
 */
class Trimmer {
    //put your code here
    
    public function moneyToDecimal($value){
        $pattern = '/[^0-9,]/';
        $replacement = '';
        $trimmed = preg_replace($pattern, $replacement, $value);
        return $trimmed;
    }
}

?>
