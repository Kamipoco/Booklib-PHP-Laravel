<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_tl_product';
    protected $guarded = ['*'];


    public $timestamps = false;
}
