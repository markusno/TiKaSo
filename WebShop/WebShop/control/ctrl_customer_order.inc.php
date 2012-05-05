<?php

require_once 'control/ctrl_base_controller.inc.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Page controller for customer order page.
 *
 * @author markus
 */
class PageController extends BasePageController {

    private $customer_order_dao;
    private $customer;
    private $orders;
    private $order_info;

    public function __construct() {
        parent::__construct();
        $this->customer = $_SESSION["customer"];
        if ($this->customer->getID() == 0) {
            header("location: index.php");
        }
        $dbObject = new DBConnection();
        $connection = $dbObject->getConnetion();
        $this->customer_order_dao = new Customer_orderDAO($connection);
        $this->orders = $this->customer_order_dao->
                getOrderListByCustomer($this->customer->getID());
        if (isset($_POST["order_id"])) {
            $this->setOrderInfo();
        }
    }

    private function setOrderInfo() {
        $this->order_info = $this->customer_order_dao->
                getOrderInfo($_POST["order_id"][0]);
    }

    /**
     *Builds html table rows and columns for information of customers orders.
     * @return html table rows 
     */
    public function getOrdersList() {
        if (empty($this->orders)) {
            return NO_ORDERS;
        }
        $order_list = "";
        foreach ($this->orders as $order) {
            $order_list = $order_list . "<tr>"
                    . "<td><input type=\"submit\" name=\"order_id\" value=\""
                    . $order->getOrderID() . "\"</td>";
            if ($order->getOrderPaid()) {
                $order_list = $order_list . "<td>" . ORDER_PAID . "</td>";
            } else {
                $order_list = $order_list . "<td>" . ORDER_NOT_PAID . "</td>";
            }
            if ($order->getPlannedDelivery() == NULL) {
                $order_list = $order_list . "<td>" . DATE_NOT_DEFINED . "</td>";
            } else {
                $order_list = $order_list . "<td>" . $order->getPlannedDelivery() . "</td>";
            }
            if ($order->getDelivered() == NULL) {
                $order_list = $order_list . "<td>" . DATE_NOT_DEFINED . "</td>";
            } else {
                $order_list = $order_list . "<td>" . $order->getDelivered() . "</td>";
            }
            $order_list = $order_list . "</tr>";
        }
        return $order_list;
    }
    
    /**
     *Getter for selected orders id number. If no order is selected returns 
     * NO_ORDER_SELECTED message defined in configuration file.
     * @return order id as string 
     */
    public function getOrderID () {
        if (!isset($_POST["order_id"])){
            return NO_ORDER_SELECTED;
        }
        return $_POST["order_id"];
    }

    /**
     *Builds information string of customers selected order.
     * @return html string (</br> as line break).
     */
    public function getOrderInfo() {
        $order_info = "";
        $order_price = 0;
        foreach ($this->order_info as $order_info_line) {
            $price = $order_info_line["amount"] * $order_info_line["unit_price"];
            $order_price += $price;
            $order_info = $order_info.$order_info_line["product_id"].": "
                    .$order_info_line["amount"]." "
                    .$order_info_line["name"]." "
                    .$price." €</br>";
        }
        $order_info = $order_info. "</br>".$order_price." €";
        return $order_info;
    }

}

?>
