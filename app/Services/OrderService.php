<?php
namespace App\Services;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderService implements OrderInterface{

    public function getAllOrders()
    {
        return Order::paginate(10);
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

    public function liveSearch($searchText)
    {
        $result = Order::query()->where('reference_id', 'LIKE',"%".$searchText."%")
         ->orWhere('id', 'LIKE', "%". $searchText. "%")
         ->get();
         $output = '';
         if(!$result){
            $output .= 'No Order match Avaialable';
         }else{

             foreach ($result as $searchValue) {
                $output .=
                '<tr>
                <td>'.$searchValue->id.'</td>
                <td>'.$searchValue->users->email.'</td>
                <td>'.$searchValue->users->name.'</td>
                <td>'.$searchValue->products->title.'</td>
                <td>'.$searchValue->message.'</td>
                <td>'.$searchValue->reference_id.'</td>
                <td>'.$searchValue->created_at->diffForHumans().'</td>
                <td><button class="btn'. ($searchValue->status === 1 ? 'btn-success': 'btn-warning') .'btn-md">'.($searchValue->status === 1 ? 'Success': 'Pending').'</button></td>
                <td><a href="edit-order/'.$searchValue->id.'" class="btn btn-primary">'.'Edit'.'</a></td>
                <td><a href="delete-order/'.$searchValue->id.'" class="btn btn-danger">'.'Delete'.'</a></td>

                <tr>';

             }

         }
         return response($output);
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
