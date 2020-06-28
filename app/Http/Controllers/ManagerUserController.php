<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;

session_start();

class ManagerUserController extends Controller
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
    public function getUsers(){
        //return view('admin.user.all_user');
        $this->AuthLogin();
        $all_user = DB::table('users')->paginate(8);
        $manager_tl_product = view('admin.user.all_user')->with('all_user',$all_user);
        return view('admin_layout')->with('admin.user.all_user',$manager_tl_product);
    }
    public function delete_user($id){
        $this->AuthLogin();
        DB::table('users')->where('id',$id)->delete();
        Session::put('message','Xóa thành viên thành công!');
        return Redirect::to('/thanh-vien');
    }

}
