<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = ['*'];

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    public $timestamps = false;
}
