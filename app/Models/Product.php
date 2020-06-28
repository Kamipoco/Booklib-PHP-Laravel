<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $table = 'tbl_category_product';
        protected $guarded = ['*'];

        protected $primaryKey = 'product_id';
        public $timestamps = false;

        // dung cai nay ma k truy ban bang model. choi DB la sao ba
}
