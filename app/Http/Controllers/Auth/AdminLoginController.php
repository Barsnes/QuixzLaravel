<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

  public function __construct(){
    $this->middleware('guest:web');
  }

  public function showLoginForm(){
    return view('auth.admin-login');
  }

  public function index(){
    dd('hello');
  }

  public function login(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required|min:6'
    ]);

    // $credentials = [
    //   'email' => $request->email,
    //   'password' => $request->password
    // ];

    //attempt login
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      // if successful
      return redirect()->intended('admin');
    }
    // if unsuccessful
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }
}
