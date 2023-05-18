<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class maau
{
    public function index()
    {
       
        return view('home.products');
    }

    public function show($id)
    {
        

        return view('home.product');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here


        return view('home.products');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here


        return view('home.products');
    }

    public function destroy($id)
    {
        
        return view('home.products');
    }
}
