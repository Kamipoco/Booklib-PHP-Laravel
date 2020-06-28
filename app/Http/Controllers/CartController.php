<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;
use Cart;
use Mail;
use App\Mail\ShoppingMail;

session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $product_Id = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_category_product')->where('product_id',$product_Id)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image_link;
        Cart::add($data);
         //Cart::destroy();

        return Redirect::to('/show-cart');

    }
    public function show_cart(){
        //$amount = DB::table('tbl_category_product')->where('product_amount')->get();

        return view('pages.cart.show_cart');
    }
    public function delete_to_cart($rowId){
            Cart::update($rowId,0);
            return Redirect::to('/show-cart');
    }
    public function update_cart_quatity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quatity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
    //Form thanh toan
    public function getFormPay(){

        $products = Cart::content();
        $user = User::find(Auth::user()->id);
        return view('pages.cart.pay',compact('products'))->withUser($user);

    }
    //Luu thong tin gio hang
    public function saveInfoShoppingCart(Request$request){
        $totalMoney = str_replace(',','',Cart::subtotal(0,3));
        //$user = User::find(Auth::user()->id);
        $name = $request->name;
        $id =  auth()->user()->id ;
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => $id,
            'tr_name' => $name,
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ]);

        if ($transactionId){
            $products = Cart::content();
            //dd($products);
            Mail::to($request->email)->send(new ShoppingMail($products));
            foreach ($products as $key=>$product)
            {
                Order::insert([
                   'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' =>$product->price
                ]);
            }
        }
        Cart::destroy();

            return view('pages.cart.success');

    }
}
