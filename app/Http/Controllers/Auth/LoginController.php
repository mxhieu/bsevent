<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login.
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|max:255|min:5',
                'password' => 'required|max:255|min:5',
            ],
            [
                'email.required' => 'Email bắt buộc nhập',
                'email.email' => 'Email định dạng email',
                'email.max' => 'Email tối đa 255 kí tự',
                'email.min' => 'Email tối thiểu 5 ký tự',
                'password.required' => 'Mật khẩu bắt buộc nhập',
                'password.max' => 'Mật khẩu tối đa 255 kí tự',
                'password.min' => 'Mật khẩu tối thiểu 5 ký tự',
            ]
        );
    }
}
