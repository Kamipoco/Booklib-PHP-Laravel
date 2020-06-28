<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests\RequestResetPassword;

session_start();

class ForgotPasswordController extends Controller
{
    public function getFormResetPassword(){
        return view('auth.password.email');
    }
    public function sendCodeResetPassword(Request $request ){
        $email = $request->email;

        $checkUser = User::where('email',$email)->first();

        $this->validate($request,
            [
                //'name' => 'required|max:25',
                //'email' => 'required|email|unique:users',
                //'password' => 'required|min:6'
                'email' => 'required',
            ],
            [
                'email.required' => 'Vui lòng điền đầy đủ email',

            ]);

        if (!$checkUser){
            //return redirect()->back()->with('danger','Email không tồn tại!');
            return redirect()->back()->with(['flag'=>'danger','message'=>'Email không tồn tại trong hệ thống!']);
        }
        $code = bcrypt(md5(time().$email));

        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
        $url = route('get.link.reset.password',['code'=>$checkUser->code,'email'=>$email]);
        $data = [
            'route'=>$url
        ];
        Mail::send('email.reset_password', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with(['flag'=>'success','message'=>'Link lấy lại mật khẩu đã được gửi vào email của bạn ']);
    }
    public function resetPassword(Request$request){
        $code = $request->code;
        $email = $request->email;

        $checkUser = User::where([
            'code'=>$code,
            'email'=>$email
        ])->first();
        if (!$checkUser){
            return redirect('/')->with(['flag'=>'danger','message'=>'Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau.']);
        }

        return view('auth.password.reset');
    }
    public function saveResetPassword(Request $request){

        $this->validate($request,
            [
                'password' => 'required|min:6',
                'password_confirm' => 'required|min:6|same:password',
            ],
            [
                'password.min' => 'Mật khẩu ít nhất 6 kí tự',
                'password.required' => 'Vui lòng điền đầy đủ mật khẩu mới',
                'password_confirm.min' => 'Mật khẩu ít nhất 6 kí tự',
                'password_confirm.required' => 'Vui lòng điền đầy đủ mật khẩu xác nhận',
                'password_confirm.same' => 'Mật khẩu xác nhận không đúng',
            ]);

        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code'=>$code,
            'email'=>$email
        ])->first();

        if (!$checkUser){
            return redirect('/')->with(['flag'=>'danger','message'=>'Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau.']);
        }
        $checkUser->password = bcrypt($request->password);
        $checkUser->save();

        return redirect()->route('get.login')->with(['flag'=>'success','message'=>'Đổi mật khẩu thành công, mời bạn đăng nhập lại']);


    }
}
