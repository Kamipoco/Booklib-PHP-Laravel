<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['*'];

    public function product(){
        return $this->belongsTo(Product::class,'or_product_id');
    }
    public function Transaction(){
        return $this->belongsTo('App\Models\Transaction','or_transaction_id','id');
    }

}
