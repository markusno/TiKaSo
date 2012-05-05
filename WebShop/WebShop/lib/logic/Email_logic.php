<?php
/**
 *Class for sending emails. 
 */
class Email_logic {

    /**
     *For sending rwegisteration confimation email.
     * @param type $customer 
     */
    public function send_registeration_mail(&$customer) {
        $message = "Hei\n" . $customer->getName() .
                "\nKiitoksia rekisteröitymisestä Verkkokauppa palveluun" .
                "\nAsiakstietosi:" .
                "\nAsiakasnumero: " . $customer->getID() .
                "\nKäyttäjätunnus: " . $customer->getUsername() .
                "\nOsoite: " . $customer->getStreetaddress() .
                "\nPostinumero: " . $customer->getpostalcode() .
                "\nPostitoimipaikka: " . $customer->getCity() .
                "\nPuhelinnumero: " . $customer->getPhoneNumber();
        $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
        mail($customer->getEmail(), "Kiitokosia rekisteröitymisestäsi", $message, $header_);
    }
    
    /**
     *For sending order confirmation email.
     * @param type $customer
     * @param type $order_id
     * @param type $orderInfo 
     */
    public function send_order_confirmation($customer, $order_id, $orderInfo){
        $message = "Hei\n" . $customer->getName() .
                "\nKiitoksia tilauksesta" .
                "\nToimitustiedot:" .
                "\n". $customer->toString() .
                "\n Tilauksen tiedot: " .
                "\n Tilaus numerolla " . $order_id . ":" .
                "\n". $orderInfo;
        $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
        mail($customer->getEmail(), "Kiitokosia rekisteröitymisestäsi", $message, $header_);
    }

}

?>
