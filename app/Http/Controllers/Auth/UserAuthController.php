<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ForgetRequest;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{

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
        dd($datas);
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
        $loginDetails = $request->validated();
        dd($loginDetails);
    }

    public function forgetPass()
    {
        return view('frontend.forget-password');
    }

    public function forgetPassCreate(ForgetRequest $request)
    {
        $email = $request->validated();
        dd($email);
        // return view('frontend.forget-password');
    }


}
