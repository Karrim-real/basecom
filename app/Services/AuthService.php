<?php
namespace App\Services;

use App\Models\User;
use App\Interfaces\UserAuthInterface;
use App\Models\VerifyAcc;

class AuthService implements UserAuthInterface{

    /**
     * register
     *
     * @param  mixed $userInfo
     * @return void
     */
    public function register(array $userInfo)
    {
        return User::create($userInfo);
    }

    public function createVerifyToken(array $verifyInfo)
    {
        return VerifyAcc::create($verifyInfo);
    }

    public function updatePassToken($userID, array $verifyInfo)
    {
        return VerifyAcc::whereId($userID)->update($verifyInfo);
    }
    /**
     * login
     *
     * @param  mixed $userInfo
     * @return void
     */
    public function login(array $userInfo)
    {

         if(auth()->attempt($userInfo)){
             return true;
         }else{
             return false;
         }

    }


    public function liveSearch($searchText)
    {
        $result = User::query()->where('title', 'LIKE',"%".$searchText."%")
         ->orWhere('id', 'LIKE', "%". $searchText. "%")
         ->get();
         $output = '';
         if(!$result){
            $output .= 'No Product Avaialable';
         }else{

             foreach ($result as $searchValue) {
                $output .=
                '<tr>
                <td>'.$searchValue->id.'</td>
                <td>'.$searchValue->title.'</td>
                <td>'.$searchValue->desc.'</td>
                <td>'.$searchValue->discount_price.'</td>
                <td>'.$searchValue->Categorys->title.'</td>
                <td><a href="edit-product/'.$searchValue->id.'" class="btn btn-primary">'.'Edit'.'</button></td>
                <td><a href="deleteproduct/'.$searchValue->id.'" class="btn btn-danger">'.'Delete'.'</button></td>

                <tr>';

             }

         }
         return response($output);

    }

    /**
     * forgetPassword
     *
     * @param  mixed $userEmail
     * @return void
     */
    public function forgetPassword($userEmail)
    {
        if(User::where('email', $userEmail)->first()){
           return true;
        }else{
            return false;
        }
    }

    public function GetUserInfo($userEmail)
    {
        $user = User::where('email', $userEmail)->first();
        return $user;
    }



    /**
     * updateAccount
     *
     * @param  mixed $userID
     * @param  mixed $newUserInfo
     * @return void
     */
    public function updateAccount($userID, array $newUserInfo)
    {
        return User::whereId($userID)->update($newUserInfo);

    }

    /**
     * deactivateAccount
     *
     * @param  mixed $userID
     * @return void
     */
    public function deactivateAccount($userID)
    {

    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        return auth()->logout();

    }
}
