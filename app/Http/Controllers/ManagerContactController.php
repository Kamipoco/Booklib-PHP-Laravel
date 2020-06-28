<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Session;
use App\Http\Requests;

session_start();

class ManagerContactController extends Controller
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
    public function get_contacts(){
        //return view('admin.user.all_user');
        $this->AuthLogin();
        $all_contact = DB::table('contacts')->get();
        $manager_tl_product = view('admin.contact.all_contact')->with('all_contact',$all_contact);
        return view('admin_layout')->with('admin.contact.all_contact',$manager_tl_product);
    }
    public function delete_contact($id){
        $this->AuthLogin();
        DB::table('contacts')->where('id',$id)->delete();
        Session::put('message','Xóa Liên hệ thành công!');
        return Redirect::to('/lien-he-admin');
    }
}
