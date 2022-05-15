<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\UserRequest;
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
        return view('admin.login');
    }

    public function show(AdminRequest $request)
    {
        // return 'login page';
        $userInfo = $request->validated();
        $loginAttempt = $this->authService->login($userInfo);
        if($loginAttempt){
            return redirect()->route('admin.dashboard')
            ->with('message', 'You have Login Successfully');
        }else{
            return redirect()->back()
            ->with('error', 'Incorrect Credential Supply or your email does not have admin access, Please check your info and try agian');
        }
    }


    public function forgetPass()
    {
        return view('admin.forget-password');
    }

    public function forgetPassPost(ForgetRequest $request)
    {
        $adminEmail = $request->validated();
        // dd($userEmail['email']);
        if($this->authService->forgetPassword($adminEmail['email'])){
            return redirect()->back()
            ->with('error', 'Email is avalable to validated');
        }else{
            return redirect()->back()
            ->with('error', 'Sorry Your email is not found');
        }
    }

    public function addAdmin(UserRequest $request)
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
         $insert = $this->authService->register($userInfo);
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

    public function destroySession()
    {
        $this->authService->logout();
        return redirect()->route('admin.login');
    }

}
