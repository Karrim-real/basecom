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
    public function register(array $userInfo)
    {
        return User::create($userInfo);
    }

    /**
     * login
     *
     * @param  mixed $userInfo
     * @return void
     */
    public function login(array $userInfo)
    {
        $checkrole =  User::where('email', $userInfo['email'])->first();
        // dd($checkrole->role_as);
         if(auth()->attempt($userInfo) && $checkrole->role_as === 1){
            return true;
         }else{
             return false;
         }

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

    /**
     * updateAccount
     *
     * @param  mixed $userID
     * @param  mixed $newUserInfo
     * @return void
     */
    public function updateAccount($userID, array $newUserInfo)
    {

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
