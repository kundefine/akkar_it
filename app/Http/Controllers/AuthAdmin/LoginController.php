<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth-admin.login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        $attempt = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        if($attempt)
        {
            return redirect()->intended(route('admin.dashboard'));
        }


        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'))->withErrors(['email' => "Invalid credential"]);
    }

    public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

}
