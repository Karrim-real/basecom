<?php
namespace App\Services;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        // $userEmail = Auth::user()->email;
        // $ImgDestination = 'uploads/orders/images';
        // $file = $OrderDetails['image'];
        // dd($file);
        // $ext = $file->getClientOriginalName();
        // $fileName = time().'_'.$userEmail.'.png';
        // $file->move($ImgDestination, $fileName);
        // $OrderDetails['image'] = $fileName;
        // dd($OrderDetails);
       return Order::create($OrderDetails);
    }

    public function UpdateOrder($orderID, array $OrderDetails)
    {
        return Order::whereId($orderID)->update($OrderDetails);

    }

    public function DeleteOrder($OrderID)
    {
      return Order::destroy($OrderID);
    }


    /*
    * User Order Function
    *User ID must be Provided
    */

    public function GetAllOrderByAUser($userID)
    {
        $userID = User::where('id', Auth::user()->id)->first();
        // dd($userID->id);
        return Order::where('user_id', $userID->id)->paginate(10);
    }
}
