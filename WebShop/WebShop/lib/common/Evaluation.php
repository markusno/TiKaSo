<?php
/**
 * Class for evaluating user input.
 *
 * @author markus
 */
class Evaluation {
    
    /**
     *Checks if value given as parameter can be used as monetary value.
     * 
     * @param type string
     * @return boolean 
     */
    public function checkMonetaryValue($value){
        $pattern = "/^(\d{1,3}){1}(( ){0,1}\d{3})*((,){1}\d{1,2}){0,1}/";
        return 0 < preg_match($pattern, $value);
    }

    /**
     *Checks if value given as parameter is empty null or white space.
     * @param type $value
     * @return boolean
     */
    public function checkEmptyValue($value){
        return $value == NULL || empty($value) || $value == " ";
    }
    
    /**
     *Checks if numeric value given as parameter is not negative
     * @param numeric value
     * @return boolean
     */
    public function checkNumericValueNotNegative($value){
        return (double)$value >= 0;
    }
    
    /**
     *Checks if value given as parameter is numeric.
     * @param string or numeric value
     * @return boolean
     */
    public function checkNumericValue($value) {
        return is_numeric($value);
    }

    /**
     * Checks if length of string given as parameter is between min and max lengths given as parameter. 
     * 
     * @param $value string to be checked
     * @param $min minimum accepted length
     * @param $max maximum accepted length
     * @return boolean
     */
    public function checkLength($value, $min, $max) {
        return ($min <= strlen($value) && strlen($value) <= $max);
    }
    
    /**
     * Checks if length of string given as parameter is between min and max lengths defined in configuration file.
     *
     * @param $user_name string
     * @return boolean
     */
    public function checkUsername($user_name){
        return $this->checkLength($user_name, USERNAME_MIN_LENGTH, USERNAME_MAX_LENGTH);        
    }
    
    /**
     * Checks if length of string given as parameter is between min and max lengths defined in configuration file.
     *
     * @param $password string
     * @return boolean
     */
    public function checkPassword($password){
        return $this->checkLength($password, PASSWORD_MIN_LENGTH, PASSWORD_MAX_LENGTH);
    }
    
    /**
     *Checks if array given as parameter contains no empty values
     * @param type $array
     * @return boolean
     */
    public function checkNoEmptyValues(&$array) {
        foreach ($array as $value) {
            if (empty($value)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     *Checks if string given as parameter is in the form of email address.
     * @param $email string
     * @return boolean
     */
    public function checkEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

?>
