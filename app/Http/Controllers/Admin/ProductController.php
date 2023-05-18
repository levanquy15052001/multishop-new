<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File as Files;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::join('tbl_categories','tbl_categories.id', '=','tbl_products.categories_id')
        ->join('tbl_brands','tbl_brands.id', '=','tbl_products.brand_id')
        ->select('tbl_products.*','tbl_brands.name as brand_name','tbl_categories.name as categories_name')
        ->get();
        return view('admin.products.all',compact('products'));
    }

    public function show($id)
    {

        $product =Product::where('id',$id)->first();

        return view('admin.products.edit',compact('product'));
    }
    
    public function add()
    {
         return view('admin.products.add');
    }

    public function store(Request $request)
    {
       
        $rule = [
            'name'=> 'required',
            'img' =>'required|mimes:jpg,jpeg,png,gif',                
            'brand'=> 'required',
            'categories'=> 'required',
            'price'=> 'required|numeric',
            'price_sale'=> 'required|numeric',
            'desc'=> 'required',
            'content'=> 'required',
        ];
        $request->validate($rule);

        //Lưu hình ảnh vào thư mục Eshopper\images\product-details
   
        $img = $request->img;
        $get_name_img = time().'_'.$img->getClientOriginalName();
        $destinationPath = public_path('template/img/products');
        $img->move($destinationPath, $get_name_img);

        // Insert Data
        $product =  new Product();
        $product->name = $request->name;
        $product->img = $get_name_img;
        $product->brand_id = $request->brand;
        $product->categories_id = $request->categories;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale ;
        $product->desc = $request->desc;
        $product->content = $request->content;
        $product->status = 1;
        $product->save();       

        return Redirect::back()->with('success','Add Product Successfuly');
    }

    public function update(Request $request, $id)
    {

        $rule = [
            'name'=> 'required',     
            'brand'=> 'required',
            'categories'=> 'required',
            'price'=> 'required|numeric',
            'price_sale'=> 'required|numeric',
            'desc'=> 'required',
            'content'=> 'required',
        ];
        $request->validate($rule);

        $product =Product::where('id',$id)->first();

        // Save Image into fodel

        if($request->has('img'))
        {
            $request->validate(['img' =>'mimes:jpg,jpeg,png,gif']);

            $file_path_delete = "template/img/products/"."$product->img";

            if (file_exists($file_path_delete)) 
            {
                Files::delete(public_path($file_path_delete));
            }

            $img = $request->img;
            $get_name_img = time().'_'.$img->getClientOriginalName();
            $destinationPath = public_path('template/img/products');
            $img->move($destinationPath, $get_name_img);
        }
       

        // Insert Data
       
        $product->name = $request->name;
        $product->img = $get_name_img ?? $product->img;
        $product->brand_id = $request->brand;
        $product->categories_id = $request->categories;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale ;
        $product->desc = $request->desc;
        $product->content = $request->content;
        $product->status = 1;
        $product->save();       

        return Redirect::back()->with('success','Update Product Successfuly');


        return view('home.products');
    }

    public function destroy($id)
    {
        
        return view('home.products');
    }
}
