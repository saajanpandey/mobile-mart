<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    use AuthenticatesUsers;
    protected $redirectTo = '/admin/dashboard';
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(AdminLoginRequest $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'))->with('unsuccess', 'Login Unsucessfull. Please Try Again');
    }
    protected function guard()
    {
        return Auth::guard("admin");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/admin/login')->with('unsuccess', 'Logout Successfully');
    }
}
