<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use App\Http\Requests;

session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();
        $all_product = DB::table('tbl_category_product')->paginate(12);
        return view('pages.home')->with('all_product',$all_product)->with('cate_product',$cate_product);
    }

    function find($value){
        $all_product = null;

        if($value == 'up')
            //$all_product = Product::all()->sortBy('product_price');
            $all_product = DB::table('tbl_category_product')->orderBy('product_price','ASC')->paginate(12);
        if($value == 'default')
            //$all_product = Product::all();
            $all_product = DB::table('tbl_category_product')->orderBy('product_id','ASC')->paginate(12);
        if($value == 'down')
            //$all_product = Product::all()->sortByDesc('product_price');
            $all_product = DB::table('tbl_category_product')->orderBy('product_price','DESC')->paginate(12);
        if ($value == 'new')
            //$all_product = Product::all()->sortByDesc('product_id');
            $all_product = DB::table('tbl_category_product')->orderBy('product_id','DESC')->paginate(12);
            // moi nhat nen cai ID no se giam

        $cate_product = Category::all()->sortBy('category_id');
        //dd($all_product);
        return view('pages.product.index')->with('all_product',$all_product)->with('cate_product',$cate_product);
    }


    public function search(Request $request){
        $keywords = $request->keywords_submit;
        if ($request->keywords_submit == null){
            return \redirect('/');
        }
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();

        $search_product = DB::table('tbl_category_product')->where('product_name','like','%'.$keywords.'%')->paginate(12);
        //dd($search_product);
        return view('pages.product.search')->with('cate_product',$cate_product)->with('search_product',$search_product);
    }
}
