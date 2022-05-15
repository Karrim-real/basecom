<?php
namespace App\Services;

use App\Interfaces\OrderInteface;
use App\Models\Order;

class OrderService implements OrderInteface{

    public function getAllOrders()
    {
        return Order::all();
    }

    public function getAOrder($OrderID)
    {
        return Order::find($OrderID);
    }

    public function createOrder($OrderDetails)
    {
       return Order::create($OrderDetails);
    }

    public function DeleteOrder($OrderID)
    {
      return Order::destroy($OrderID);
    }
}
