<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Product;
use App\Http\Requests;

session_start();

class ProductController extends Controller
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
    //all
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_category_product')
            ->join('tbl_tl_product','tbl_tl_product.category_id','=','tbl_category_product.category_id')
            ->orderBy('tbl_category_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    //add
    public function add_product(){
        $this->AuthLogin();
        //lay ra the loai tu co so du lieu tbl_tl_product
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['product_source'] = $request->product_source;
        $data['product_image_link'] = $request->product_image_link;
        $data['product_price'] = $request->product_price;
        $data['product_amount'] = $request->product_amount;

        $get_image = $request->file('product_image_link');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image_link'] = $new_image;
            DB::table('tbl_category_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return Redirect::to('add-product');
        }
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công!');
        return Redirect::to('add-product');

    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();

        $edit_product = DB::table('tbl_category_product')->where('product_id',$product_id)->get();
        //dd($edit_product);
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_category;
        $data['product_source'] = $request->product_source;
        $data['product_image_link'] = $request->product_image_link;
        $data['product_price'] = $request->product_price;
        $data['product_amount'] = $request->product_amount;
        $get_image = $request->file('product_image_link');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image_link'] = $new_image;
            DB::table('tbl_category_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return Redirect::to('all-product');
        }
        DB::table('tbl_category_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function showOrder(){
        $this->AuthLogin();
        $transactions = Transaction::paginate(8);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin.order_product',$viewData);
    }
    public function viewOrder($id){
        $this->AuthLogin();
        $transaction = DB::table('transactions')->where('transactions.id',$id)
            ->select('transactions.*')
            ->get();
        $order_by_id = DB::table('transactions')->where('transactions.id',$id)
            ->join('users','transactions.tr_user_id','=','users.id')
            ->join('orders','transactions.id','=','orders.or_transaction_id')
            ->join('tbl_category_product','orders.or_product_id','=','tbl_category_product.product_id')
            ->select('transactions.*','users.*','orders.*','tbl_category_product.*')
            ->get();
        /*
        echo '<pre>';
        print_r($order_by_id);
        echo '</pre>';
        */

            $manager_order_by_id = view('admin.component.order_detail')->with('order_by_id',$order_by_id)->with('transaction',$transaction);
            return view('admin_layout2')->with('admin.component.order_detail',$manager_order_by_id);



    }
    public function delete_order($id){
        $this->AuthLogin();
        DB::table('transactions')->where('id',$id)->delete();
        Session::put('message','Xóa đơn hàng thành công!');
        return Redirect::to('/order-product');
    }

    //END admin ko duoc dung phan kiem tra admin_id vao phan duoi day
    public function detail_product($product_id){
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();

        //$show_lq = DB::table('tbl_category_product')->limit(4)->get();
        $show_product = DB::table('tbl_category_product')
            ->join('tbl_tl_product','tbl_tl_product.category_id','=','tbl_category_product.category_id')
            ->inRandomOrder()->limit(4)->get();

        $detail_product = DB::table('tbl_category_product')
            ->join('tbl_tl_product','tbl_tl_product.category_id','=','tbl_category_product.category_id')
            ->where('tbl_category_product.product_id',$product_id)->get();

        $all_product = DB::table('tbl_category_product')
            ->join('tbl_tl_product','tbl_tl_product.category_id','=','tbl_category_product.category_id')
            ->orderBy('tbl_category_product.product_id','desc')->limit(3)->get();
        //dd($detail_product);
        return view('pages.product.show_detail')->with('cate_product',$cate_product)->with('detail_product',$detail_product)->with('all_product',$all_product)->with('show_product',$show_product);
    }
}
