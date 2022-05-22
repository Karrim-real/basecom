<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\AdminAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministraviceController extends Controller
{

    private AdminAuthService $authService;

    public function __construct(AdminAuthService $authService)
    {
         $this->authService = $authService;
    }


    public function index()
    {
        $allUsers = $this->authService->users();
        return view('admin.users.index',compact('allUsers'));
    }


    public function create()
    {
        # code...
    }

    public function store(UserRequest $request)
    {
        $userInfo = $request->validated();
        $userInfo['role_as'] = 0;
         //check Users email
         $check = User::where('email', $userInfo['email'])->first();
         // dd($datas);
         if($check){
             return redirect()->back()
             ->with('error', 'Email Aleady Exist');
         }
         //Password Hash
         $userInfo['password'] = Hash::make($request->input('password'));
         $insert = $this->authService->addUser($userInfo);
         // dd($insert);
         if($insert){
             return redirect()->route('home')
             ->with('message', 'You have Add a user as admin');
         }
         else{
             return redirect()->back()
             ->with('message', 'An Error Occur');
         }

    }

    public function edit($user)
    {
        $user = $this->authService->getUserByID($user);
        return view('admin.users.edit-user', compact('user'));
    }

    public function update(UserUpdateRequest $request, $user)
    {
        $newUserDetails = $request->validated();
        $this->authService->updateAccount($user, $newUserDetails);
        return redirect()->route('users')->with('message', 'User Profile Updated');
    }

    public function destroy($user)
    {
        # code...
    }


    // public function forgetPass()
    // {
    //     return view('admin.forget-password');
    // }
//    public function forgetPassPost(ForgetRequest $request)
//     {
//         $adminEmail = $request->validated();
//         // dd($userEmail['email']);
//         if($this->authService->forgetPassword($adminEmail['email'])){
//             return redirect()->back()
//             ->with('error', 'Email is avalable to validated');
//         }else{
//             return redirect()->back()
//             ->with('error', 'Sorry Your email is not found');
//         }
//     }


}
