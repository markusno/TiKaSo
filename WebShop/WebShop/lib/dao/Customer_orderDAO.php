<?php
/**
 * Class for accessing customer order information in database
 *
 * @author markus
 */
class Customer_orderDAO {

    private $connection;

    /**
     *Assigns PDO object given as parameter to be used by functions.
     * @param PDO $connection 
     */
    public function __construct(&$connection) {
        $this->connection = $connection;
    }

    /**
     *Gets information of all of customers orders from database by customer id given as parameter.
     * Returns array of customer order objects.
     * @param numeric $customer_id
     * @return \Customer_order 
     */
    public function getOrderListByCustomer($customer_id) {
        $query = $this->connection->prepare("SELECT *
                FROM Customer_order
                WHERE customer_id = ?;");
        $query->execute(array($customer_id));
        $orders = array();
        while ($orderRow = $query->fetch()) {
            $order = new Customer_order($orderRow);
            $orders[] = $order;
        }
        return $orders;
    }

    /**
     *Gets information of products in one order from database by order id.
     * Returns products information as array.
     * @param type $order_id
     * @return array 
     */
    public function getOrderInfo($order_id) {
        $query = $this->connection->prepare("
            SELECT Product_in_order.product_id, name, amount, unit_price
            FROM Product_in_order, Product
            WHERE Product_in_order.product_id = Product.product_id AND
            order_id = ?;");
        $query->execute(array($order_id));
        $order_info = array();
        $trimmer = new Trimmer();
        while ($row = $query->fetch()){
            $row["unit_price"] = (double)$trimmer->moneyToDecimal($row["unit_price"]);
            $order_info[] = $row;
        }
        return $order_info;
    }

    /**
     *Creates new row into order table and rows for all products in order into product in order table.
     * @param type $customer_id
     * @param type $shoppings
     * @return type 
     */
    public function makeOrder($customer_id, &$shoppings) {
        $query = $this->connection->prepare("INSERT INTO Customer_order 
            (customer_id) VALUES (?);");
        $query->execute(array($customer_id));
        $query2 = $this->connection->
                prepare("SELECT 
                    currval(pg_get_serial_sequence('Customer_order', 'order_id'));");
        $query2->execute();
        $idRow = $query2->fetch();
        $order_id = $idRow[0];
        $this->putProductsInOrder($order_id, $shoppings);
        return $order_id;
    }

    private function putProductsInOrder($order_id, &$shoppings) {
        $query = $this->connection->prepare("INSERT INTO Product_in_order
            (order_id, product_id, amount) VALUES (?, ?, ?);");
        foreach ($shoppings as $product_id => $amount) {
            $query->execute(array($order_id, $product_id, $amount));
        }
    }

}

?>
