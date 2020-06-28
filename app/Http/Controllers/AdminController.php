<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dasboard');
        }else
        {
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dasboard(){
        $this->AuthLogin();
        return view('admin.dasboard');
    }
    public function dasboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = MD5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //$tbl_null = DB::table('tbl_admin')->where('admin_email',null)->where('admin_password',null);
        if($result){
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dasboard');
        }else
        {
            Session::put('message','Vui lòng điền thông tin đầy đủ và chính xác!');
            return Redirect::to('/admin');
        }
        /*if ($tbl_null){
            Session::put('message2','Vui lòng điền đầy đủ thông tin!');
            return Redirect::to('/admin');
        }
        */
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_id',null);
        return  Redirect::to('/admin');
    }
}
