<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ForgetRequest;
use App\Mail\VerifyAccount;
use App\Mail\VerifyPassword;
use App\Models\User;
use App\Services\AuthService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
         $this->authService = $authService;
    }
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        if(Auth::user()){
        $this->authService->logout();
        }
        return view('frontend.register');
    }

    /**
     * store
     *
     * @return void
     * Params Email, Password
     */
    public function store(UserRequest $request)
    {
        $datas = $request->validated();
        //check Users email
        $check = User::where('email', $datas['email'])->first();
        // dd($datas);
        if($check){
            return redirect()->back()
            ->with('error', 'Email Aleady Exist');
        }
        //Password Hash
        $datas['password'] = Hash::make($request->input('password'));
        $insert = $this->authService->register($datas);
        // dd($insert->id);
        if($insert){
        $message = User::where('email', $datas['email'])->first();
        // dd($user->emai);
            Mail::to($message->email)->send(new VerifyAccount($message));
            return redirect()->route('home')
            ->with('message', 'You have Register Successfully');
        }
        else{
            return redirect()->back()
            ->with('message', 'An Error Occur');
        }

    }


    //Login Page
    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        if(Auth::user()){
        $this->authService->logout();
        }
        return view('frontend.login');
    }

    /**
     * create
     * Method Get
     *Param Email, Username, Password
     * @return void
     */
    public function create(LoginRequest $request)
    {
        $userInfo = $request->validated();
        // dd($userInfo);
        $checkrole =  User::where('email', $userInfo['email'])->first();
        // dd($checkrole);
        $loginAttempt = $this->authService->login($userInfo);
        if($loginAttempt && $checkrole->role_as  === 1){
            return redirect()->route('admin.dashboard')
            ->with('message', 'You have Login as Admin Successfully');
        }elseif($loginAttempt){
            return redirect()->route('home')
            ->with('message', 'You have Login Successfully');
        }else{
            return redirect()->back()
            ->with(
                'error', 'Incorrect Credential Supply, Please check your info and try agian'
            );
        }

        // dd($loginDetails);
    }



    public function showAccount()
    {
        return view('frontend.myaccount');
    }

    public function forgetPass()
    {
        if(Auth::user()){
            Auth::logout();
        }
        return view('frontend.forget-password');
    }

    public function forgetPassCreate(ForgetRequest $request)
    {
        $userEmail = $request->validated();
        // dd($userEmail['email']);

        if($this->authService->forgetPassword($userEmail['email'])){
            $user = User::where('email', $userEmail)->first();
            // dd($user->name);
            Mail::to($user->email)->send(new VerifyPassword($user));
            return redirect()->back()
            ->with('error', 'Email is avalable to validated');
        }else{
            return redirect()->back()
            ->with('error', 'Sorry Your email is not found, kindly click on register');
        }

        // return view('frontend.forget-password');
    }

    public function destroySession()
    {
        $this->authService->logout();
        return redirect()->home();
    }


}
