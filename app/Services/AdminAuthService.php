<?php
namespace App\Services;

use App\Models\User;
use App\Interfaces\AdminAuthInterface;
use Illuminate\Support\Facades\Auth;

class AdminAuthService implements AdminAuthInterface{

    /**
     * register
     *
     * @param  mixed $userInfo
     * @return void
     */
    public function addUser(array $userInfo)
    {
        return User::create($userInfo);
    }

    /**
     * users
     *
     *
     * @return void array users
     */
    public function users()
    {
      return User::paginate(10);
    }

    /**
     * forgetPassword
     *
     * @param  mixed $userEmail
     * @return void
     */
    public function getUserByID($user)
    {
        return User::find($user);
    }

    public function liveSearch($searchText)
    {
        $result = User::query()->where('name', 'LIKE',"%".$searchText."%")
         ->orWhere('email', 'LIKE', "%". $searchText. "%")
         ->get();
         $output = '';
         if(!$result){
            $output .= 'No Product Avaialable';
         }else{

             foreach ($result as $searchValue) {
                $output .=
                '<tr>
                <td>'.$searchValue->id.'</td>
                <td>'.$searchValue->name.'</td>
                <td>'.$searchValue->email.'</td>
                <td>'.$searchValue->phone.'</td>
                <td>'.$searchValue->role_as.'</td>
                <td>'.$searchValue->created_at->diffForHumans().'</td>
                <td><a href="useredit/'.$searchValue->id.'" class="btn btn-primary">'.'Edit'.'</button></td>

                <tr>';

             }

         }
         return response($output);

    }

    /**
     * updateAccount
     *
     * @param  mixed $userID
     * @param  mixed $newUserInfo
     * @return void
     */
    public function updateAccount($user, array $newUserInfo)
    {
        return User::whereId($user)->update($newUserInfo);

    }

    /**
     * deactivateAccount
     *
     * @param  mixed $userID
     * @return void
     */
    public function deletetUser($user)
    {
        return User::destroy($user);
    }

}
