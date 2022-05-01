<?php
namespace App\Interfaces;

interface UserAuthInterface
{

    /**
     * register
     *
     * @param  array $userInfo
     * @return void
     */
    public function register(array $userInfo);

    /**
     * login
     *
     * @param  array $userInfo
     * @return void
     */
    public function login(array $userInfo);

    /**
     * forgetPassword
     *
     * @param  mixed $userEmail
     * @return void
     */
    public function forgetPassword($userEmail);


     /**
      * updateAccount
      *
      * @param  mixed $newUserInfo
      * @return void
      */
     public function updateAccount($userID, array $newUserInfo);

     /**
      * deactivate
      *
      * @param  mixed $userID
      * @return void
      */
     public function deactivateAccount($userID);

     public function logout();


}
