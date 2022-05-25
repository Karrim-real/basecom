<?php
namespace App\Interfaces;

interface AdminAuthInterface
{

    /**
     * register
     *
     * @param  array $userInfo
     * @return void
     */
    public function addUser(array $userInfo);

    /**
     * liveSearch
     *
     * @param  mixed $searchText
     * @return void
     */
    // public function liveSearch($searchText);

    /**
     * login
     *
     * @param  array $userInfo
     * @return void
     */
    public function users();

    /**
     * forgetPassword
     *
     * @param  mixed $userEmail
     * @return void
     */
    public function getUserByID($user);


     /**
      * updateAccount
      *
      * @param  mixed $newUserInfo
      * @return void
      */
     public function updateAccount($user, array $newUserInfo);

     /**
      * deleteUser
      *
      * @param  mixed $user
      * @return void
      */
     public function deletetUser($user);




}
