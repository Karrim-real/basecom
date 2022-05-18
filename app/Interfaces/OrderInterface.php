<?php

namespace App\Interfaces;

interface OrderInterface{

    public function getAllOrders();
    public function getAOrder($OrderID);
    public function createOrder(array $OrderDetails);
    public function DeleteOrder($OrderID);
}
