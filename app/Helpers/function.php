<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;

if (!function_exists('get_data_user')){
    function get_data_user($type,$field = 'id'){
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}

