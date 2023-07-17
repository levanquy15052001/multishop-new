<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getLogin(){

       return view('admin.pages.login');

    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['email' => $request->email,  'password' => $request->password])){
              
            return redirect()->route('admin.index');

        }else {
            return redirect()->back()->with('waring', 'Account does not exist in the system');
        }
    }
 
    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public function dashboard()
    {
        // return view('admin.page.dashboard');
    }
}
