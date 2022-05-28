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
     * createVerifyToken
     *
     * @param  mixed $verifyInfo
     * @return void
     */
    public function createVerifyToken(array $verifyInfo);

    /**
     * updatePassToken
     *
     * @param  mixed $userID
     * @param  mixed $verifyInfo
     * @return void
     */
    public function updatePassToken($userID, array $verifyInfo);

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
     * GetUserInfo
     *
     * @param  mixed $userEmail
     * @return void
     */
    public function GetUserInfo($userEmail);

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
