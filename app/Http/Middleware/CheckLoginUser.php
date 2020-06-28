<?php


namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLoginUser
{
    public function handle($request,Closure $next){
        if (!Auth::check('web')){
            return redirect()->route('get.login')->with(['flag'=>'danger','message'=>'Bạn chưa đăng nhập tài khoản!']);
        }
        return $next($request);
    }
}
