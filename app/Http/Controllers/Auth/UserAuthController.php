<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ForgetRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // dd($insert);
        if($insert){
            return redirect()->route('home')
            ->with('message', 'You have Register Successfully');
        }
        else{
            return redirect()->back()
            ->with('message', 'An Error Occur');
        }

    }

    /**
     * show
     *
     * @return void
     */
    public function show()
    {
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
        $loginAttempt = $this->authService->login($userInfo);
        if($loginAttempt){
            return redirect()->route('home')
            ->with('message', 'You have Register Successfully');
        }else{
            return redirect()->back()
            ->with('error', 'Incorrect Credential Supply, Please check your info and try agian');
        }
        // dd($loginDetails);
    }

    public function forgetPass()
    {
        return view('frontend.forget-password');
    }

    public function forgetPassCreate(ForgetRequest $request)
    {
        $userEmail = $request->validated();
        // dd($userEmail['email']);
        if($this->authService->forgetPassword($userEmail['email'])){
            return redirect()->back()
            ->with('error', 'Email is avalable to vlaideated');
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
