<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function activeTransaction($id){
        $transaction = Transaction::find($id);
        //tru di so luong

        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders){
            foreach ($orders as $order){
                $product = Product::find($order->or_product_id);

                $soluongconlai = $product->product_amount - $order->or_qty;
                $product->product_amount =  $soluongconlai;
                $product->save();
            }
        }
        //cap nhat lai trang thai
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('thanhcong','Xử lí đơn hàng thành công!');

    }
}
