<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evaluation
 *
 * @author markus
 */
class Evaluation {
    
    public function checkNumericValue($value) {
        return is_numeric($value);
    }

    public function checkLength($value, $min, $max) {
        if (is_numeric($value)) {
            return 10^$min <= $value && $value < 10^($max+1);
        }
        return ($min <= strlen($value) && strlen($value) <= $max);
    }

    public function checkEmptyValues($array) {
        foreach ($array as $value) {
            if (empty($value)) {
                return true;
            }
        }
        return false;
    }

    public function checkEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

?>
