<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\PasswordRequest;
use App\Mail\VerifyAccount;
use App\Mail\VerifyPassword;
use App\Models\User;
use App\Models\VerifyAcc;
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
        // dd(Str::random(10));
        $datas['password'] = Hash::make($request->input('password'));
        $verifyInfo['email'] = $datas['email'];
        $verifyInfo['token'] = bcrypt($datas['email']);
        $insert = $this->authService->register($datas)
        && $this->authService->createVerifyToken($verifyInfo);
        // dd($insert->id);
        if($insert){
        $user = User::where('email', $datas['email'])->first();
        $message['name'] = $user->name;
        $message['email'] = $user->email;
        $message['token'] = $verifyInfo['token'];
            Mail::to($user->email)->send(new VerifyAccount($message));
            return redirect()->route('home')
            ->with('message', 'You have Register Successfully');
        }
        else{
            return redirect()->back()
            ->with('message', 'An Error Occur');
        }

    }

    public function verify($verifytoken)
    {
        $checkToken = VerifyAcc::where('token', $verifytoken)->first();
        if($checkToken){
            $user = $this->authService->GetUserInfo($checkToken->email);
            // dd($user['id']);
            if($user){
                if($user['email_verified_at'] !== null){
                    return redirect()->route('login')
            ->with('autherror', 'You have Already verified your account, please login and start shopping, Thanks!');
                }
                $userInfo['email_verified_at'] = Carbon::now();
                $this->authService->updateAccount($user['id'], $userInfo);
                return redirect()->route('home')
            ->with('message', 'You have Verify your Account, Please login and shop');

            }
            return redirect()->route('login')
            ->with('autherror', 'User Not Found, please check you email and Try Again');
            // dd($checkToken->email);
        }
        return redirect()->route('login')
            ->with('autherror', 'Mismatch Token, please check your email and try again');
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
            $userInfo = $this->authService->GetUserInfo($userEmail);
            $checkToken = VerifyAcc::where('email',$userInfo['email'])->first();
            // dd($checkToken);
            if(!$checkToken){
                $verifyInfo['name'] = $userInfo['name'];
                $verifyInfo['email'] = $userInfo['email'];
                $verifyInfo['token'] = bcrypt(time());
                $this->authService->createVerifyToken($verifyInfo);
                Mail::to($userInfo['email'])->send(new VerifyPassword($verifyInfo));
                return redirect()->back()
                ->with('message', 'We have Sent a Verification link to your Email, Kindly check and change your password');
            }else{
                $verifyInfo['email'] = $userInfo['email'];
                $verifyInfo['token'] = bcrypt($userInfo['email'].time());
                $this->authService->updatePassToken($checkToken['id'],$verifyInfo);
                Mail::to($userInfo['email'])->send(new VerifyPassword($verifyInfo));
                return redirect()->back()
                ->with('message', 'We have Sent a Verification link to your Email, Kindly check and change your password');
            }

        }else{
            return redirect()->back()
            ->with('error', 'Sorry Your email is not found, kindly click on register');
        }

    }

    public function changePass($verifyToken)
    {
        // return $verifyToken;
        if($verifyToken){
            return view('frontend.changepassword', compact('verifyToken'));
        }
        return redirect()->route('home')
                ->with('autherror', 'Your token as Expired, Please request for new password');
    }

    public function changepassPost(PasswordRequest $request, $verifyToken)
    {
        $userInfo = $request->validated();
        $newUserInfo['password'] = bcrypt($userInfo['password']);
        $checkToken = VerifyAcc::where('token',$verifyToken)->first();
        if(!$checkToken){
            return redirect()->back()
                ->with('autherror', 'Your token as Expired, Please request for new reset link in forget password');
        }
            $checkUser = $this->authService->GetUserInfo($checkToken['email']);
        if($userInfo){
            $this->authService->updateAccount($checkUser['id'], $newUserInfo);
            return redirect()->route('login')
                ->with('message', 'Pasword Change successfully, Please login now with new password');
        }
        return redirect()->route('login')
                ->with('autherror', 'Unable to process request, Please try again later');
        // dd($userInfo, $verifyToken);
    }

    public function destroySession()
    {
        $this->authService->logout();
        return redirect()->home();
    }


}
