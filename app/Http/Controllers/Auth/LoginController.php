<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

session_start();

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

   public function getLogin(){
       return view('auth.login');
   }
   public function postLogin(Request $request){
       $this->validate($request,
           [
               //'name' => 'required|max:25',
               //'email' => 'required|email|unique:users',
               //'password' => 'required|min:6'
               'email'=>'required|email',
               'password'=>'required|min:6',
           ],
           [
                'email.required'=>'Vui lòng nhập email',
               'email.email'=>'Email không đúng định dạng',
               'password.required'=>'Vui lòng nhập mật khẩu',
               'password.min'=>'Mật khẩu ít nhất 6 kí tự'
           ]);
       //$credentials = $request->only('email', 'password');
       $credentials = array('email' => $request->email,'password' => $request->password);
       if (Auth::attempt($credentials)){
           //return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
           return redirect()->route('home');
       }else
       {
           return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại!']);
       }

   }
   public function getLogout(){
       Auth::logout();
       return redirect()->route('home');
   }

}
