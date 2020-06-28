<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;


session_start();


class ProfileController extends Controller
{
    public function getProfile($id){

        //$get_profile = DB::table('users')->where('id','=',$id)->first();
        //return view('pages.profile.profile')->with('get_profile',$get_profile);

        $user = User::find($id);
        if ($user){
            return view('pages.profile.profile')->withUser($user);
        }else{
            return redirect()->back();
        }
    }
    public function edit_profile(){
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            if ($user){
                return view('pages.profile.edit_profile')->withUser($user);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
    public function update_profile(Request $request){
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            $this->validate($request,[
                'name'=>'required|min:6',
                'phone'=>'required',
                'email'=>'required|email',
                //'email'=>'required|email|unique:users',
                'date_of_birth'=>'required',
                'address'=>'required'
            ],
                [
                    'name.required'=>'Vui lòng nhập tên của bạn',
                    'name.min'=>'Tên phải ít nhất 6 kí tự',
                    'phone.required'=>'Vui lòng nhập SĐT',
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Email không đúng định dạng',
                    //'email.unique'=>'Email này đã tồn tại',
                    'date_of_birth.required'=>'Vui lòng nhập ngày sinh',
                    'address.required'=>'Vui lòng nhập địa chỉ của bạn'
                ]);
            $user = Auth::user();

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->date_of_birth = $request->date_of_birth;
            $user->address = $request->address;
            $user->save();

            return redirect()->route('user.profile',$user->id);


            //Session::flash('success','Cập nhật tài khoản thành công!');
            //return redirect()->back();
        }
    }
    public function get_order_placed($id){

        $order_by_id = DB::table('users')->where('users.id',$id)
            ->join('transactions','users.id','=','transactions.tr_user_id')
            ->select('users.*','transactions.*')
            ->paginate(8);

        //dd(count($order_by_id));
        return view('pages.profile.order_placed')->with('order_by_id',$order_by_id);
    }
    public function viewOrder($id){

        $transaction = DB::table('transactions')->where('transactions.id',$id)
            ->select('transactions.*')
            ->get();
        $order_by_id = DB::table('transactions')->where('transactions.id',$id)
            ->join('users','transactions.tr_user_id','=','users.id')
            ->join('orders','transactions.id','=','orders.or_transaction_id')
            ->join('tbl_category_product','orders.or_product_id','=','tbl_category_product.product_id')
            ->select('transactions.*','users.*','orders.*','tbl_category_product.*')
            ->get();
        //dd($order_by_id);
        $manager_order_by_id = view('pages.profile.order_detail_placed')->with('order_by_id',$order_by_id)->with('transaction',$transaction);
        return view('layout7')->with('pages.profile.order_detail_placed',$manager_order_by_id);
    }
}
