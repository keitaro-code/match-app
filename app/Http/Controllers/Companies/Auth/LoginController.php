<?php

namespace App\Http\Controllers\Companies\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//add
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    //add

    public function showLoginForm()
    {
        return view('companies.auth.login');
    }

    protected function guard(){
        return Auth::guard('companies');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // リダイレクト先変更
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo =  'users/user_list';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //見本はCompaniesHomeControllerだけど、合ってるはず
        $this->middleware('guest:companies')->except('logout');
    }
}
