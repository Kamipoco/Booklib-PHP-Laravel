<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function getContact(){
        return view('contact');
    }
    public function saveContact(Request $request){
        if (Auth::user()) {
            $data = $request->except('_token');
            $data['created_at'] = $data['update_at'] = Carbon::now();
            Contact::insert($data);


            return redirect()->back()->with('thanhcong', 'Lưu thông tin liên hệ thành công!');
        }else{
            return redirect('dang-nhap')->with(['flag'=>'danger','message'=>'Bạn chưa đăng nhập!']);
        }

    }
    public function activeContact($id){
        $contact = Contact::find($id);
        //dd($contact);

        $contact->c_status = Contact::STATUS_DONE;
        $contact->save();

        return redirect()->back()->with('thanhcong','Xử lí yêu cầu khách hàng thành công!');
    }
}
