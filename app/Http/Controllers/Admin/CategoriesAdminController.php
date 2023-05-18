<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as Files;

class CategoriesAdminController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.all',compact('categories'));
    }

    public function show($id)
    {
        $categories = Categories::where('id',$id)->first();
        return view('admin.categories.edit',compact('categories'));
    }

    public function store(Request $request)
    {
        $rule = [
            'name'=> 'required',
            'img' =>'required|mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ];
        $request->validate($rule);
       
        $img = $request->img;
        $get_name_img = time().'_'.$img->getClientOriginalName();
        $destinationPath = public_path('img/logo');
        $img->move($destinationPath, $get_name_img);

        $categories = new Categories();
        $categories->name = $request->name;
        $categories->img = $get_name_img;
        $categories->status = $request->status;
        $categories->save();
        return redirect()->back()->with('success','Add Categories Successfuly');


    }

    public function update(Request $request, $id)
    {
        $rule = [
            'name'=> 'required',
            'status' => 'required'
        ];
        $request->validate($rule);
       
        $categories =Categories::where('id',$id)->first();

        // Save Image into fodel

        if($request->has('img'))
        {
            $request->validate(['img' =>'mimes:jpg,jpeg,png,gif']);

            $file_path_delete = "img/logo/"."$categories->img";

            if (file_exists($file_path_delete)) 
            {
                Files::delete(public_path($file_path_delete));
            }

            $img = $request->img;
            $get_name_img = time().'_'.$img->getClientOriginalName();
            $destinationPath = public_path('img/logo/');
            $img->move($destinationPath, $get_name_img);
        }

        $categories->name = $request->name;
        $categories->img = $get_name_img?? $categories->img;
        $categories->status = $request->status;
        $categories->save();


        return redirect()->back()->with('success','Update Categories Successfuly');
    }

    public function destroy($id)
    {
        
        return view('home.products');
    }

    public function get_add()
    {
        return view('admin.categories.add');
    }
}
