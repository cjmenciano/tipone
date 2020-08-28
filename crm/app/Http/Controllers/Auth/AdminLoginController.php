<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AdminLoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Admin Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating  Admin users for the application
  | and redirecting them to your admin home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

    public function __construct()
    {
        $this->middleware('guest:admin',  ['except' => ['logout']]);
    }

    // Redirect to Admin Login Page
    public function showLoginForm()
    {
        return view ('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
