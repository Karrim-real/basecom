<?php
namespace App\Services;

use App\Interfaces\OrderInterface;
use App\Models\Order;

class OrderService implements OrderInterface{

    public function getAllOrders()
    {
        return Order::all();
    }

    public function getAOrder($OrderID)
    {
        return Order::find($OrderID);
    }

    public function createOrder(array $OrderDetails)
    {
       return Order::create($OrderDetails);
    }

    public function DeleteOrder($OrderID)
    {
      return Order::destroy($OrderID);
    }
}
