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
      return User::all();
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
