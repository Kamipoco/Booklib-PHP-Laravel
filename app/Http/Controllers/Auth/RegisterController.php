<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function getRegister(){
        return view('auth.register');
    }
    public function postRegister(Request $request){

        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                're_password'=>'required|same:password'

            ],
            [
            'name.require' => 'Vui lòng điền đầy đủ họ tên',
            'email.require'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email này đã tồn tại',
            'password.require'=>'Vui lòng nhập mật khẩu',
            're_password.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('get.login')->with(['flag'=>'success','message'=>'Tạo tài khoản thành công']);
            //return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');

    }

}
