<?php
namespace models;

use components\Database;
    
Class Order 
{
    public static function createOrder($name, $number, $comment, $order)
    {
        $db = Database::getConnection();
        $jsonOrder = json_encode($order);

        $query = $db->prepare('INSERT INTO order_products (user_name, user_number, comment, products) VALUES (:name, :number, :comment, :order)');
        $result = $query->execute(array('name' => $name, 'number' => $number, 'comment' => $comment, 'order' => $jsonOrder));

        return $result;
    }
}