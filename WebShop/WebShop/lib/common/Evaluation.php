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
    
    public function checkMonetaryValue($value){
        $pattern = "/^(\d{1,3}){1}(( ){0,1}\d{3})*((,){1}\d{1,2}){0,1}/";
        return 0 < preg_match($pattern, $value);
    }


    public function checkEmptyValue($value){
        return $value == NULL || empty($value) || $value == " ";
    }
    
    public function checkNumericValueNotNegative($value){
        return (double)$value >= 0;
    }
    
    public function checkNumericValue($value) {
        return is_numeric($value);
    }

    public function checkLength($value, $min, $max) {
        return ($min <= strlen($value) && strlen($value) <= $max);
    }
    
    public function checkUsername($user_name){
        return $this->checkLength($user_name, USERNAME_MIN_LENGTH, USERNAME_MAX_LENGTH);        
    }
    
    public function checkPassword($password){
        return $this->checkLength($password, PASSWORD_MIN_LENGTH, PASSWORD_MAX_LENGTH);
    }
    
    public function checkNoEmptyValues(&$array) {
        foreach ($array as $value) {
            if (empty($value)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    public function checkEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

?>
