<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;

session_start();

class CateController extends Controller
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
    public function all_tl_product(){
        $this->AuthLogin();
        $all_tl_product = DB::table('tbl_tl_product')->get();
        $manager_tl_product = view('admin.category.all_tl_product')->with('all_tl_product',$all_tl_product);
        return view('admin_layout')->with('admin.category.all_tl_product',$manager_tl_product);
    }
    public function add_tl_product(){
        $this->AuthLogin();
        return view('admin.category.add_tl_product');
    }
    public function save_tl_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_tl'] = $request->category_tl;
        $data['category_desc'] = $request->category_desc;

        DB::table('tbl_tl_product')->insert($data);
        Session::put('message','Thêm thể loại thành công!');
        return Redirect::to('add-tl-product');
    }
    public function edit_tl_product($category_id){
        $this->AuthLogin();
        //$cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();
        $edit_tl_product = DB::table('tbl_tl_product')->where('category_id',$category_id)->get();
        $manager_tl_product = view('admin.category.edit_tl_product')->with('edit_tl_product',$edit_tl_product);
        return view('admin_layout')->with('admin.category.edit_tl_product',$manager_tl_product);
    }
    public function update_tl_product(Request $request,$category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_tl'] = $request->category_tl;
        $data['category_desc'] = $request->category_desc;

        DB::table('tbl_tl_product')->where('category_id',$category_id)->update($data);
        Session::put('message','Cập nhật thể loại sản phẩm thành công!');
        return Redirect::to('all-tl-product');
    }
    public function delete_tl_product($category_id){
        $this->AuthLogin();
        DB::table('tbl_tl_product')->where('category_id',$category_id)->delete();
        Session::put('message','Xóa thể loại sản phẩm thành công!');
        return Redirect::to('all-tl-product');
    }
    //END admin ko duoc dung phan kiem tra admin_id vao phan duoi day
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_tl_product')->orderBy('category_id','desc')->get();
        $category_by_id = DB::table('tbl_category_product')->join('tbl_tl_product','tbl_category_product.category_id','=','tbl_tl_product.category_id')
            ->where('tbl_category_product.category_id',$category_id)->get();

        return view('pages.category.show_category')->with('cate_product',$cate_product)->with('category_by_id',$category_by_id);
    }
    public function getListProduct(Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        if ($id = array_pop($url)){
            $products = Product::where([
               'category_id ' => $id
            ]);


            if ($request->orderby){
                $orderby = $request->orderby;

                switch ($orderby){
                    case 'desc':
                        $products->orderBy('product_id','DESC');
                        break;
                    case 'asc':
                        $products->orderBy('product_id','ASC');
                        break;
                    case 'price_max':
                        $products->orderBy('product_price','ASC');
                        break;
                    case 'price_min':
                        $products->orderBy('product_price','DESC');
                        break;
                    default:
                        $products->orderBy('product_id','DESC');
                }

        }
            $products = $products->paginate('12');
            $cateProduct = Category::find($id);

            $viewData = [
                'products' => $products,
                'cateProduct' => $cateProduct,
            ];
            return view('final_layout')->with('product.home',$viewData);

        }
        return \redirect('/');


    }

}
