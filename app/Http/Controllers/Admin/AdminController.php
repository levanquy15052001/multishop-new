<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    public function getLogin(){

       return view('admin.login_admin');

    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['email' => $request->email,  'password' => $request->password])){
              
                    return redirect()->route('admin.dashboard');

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
        return view('admin.dashboard');
    }

    public function demoAdmin()
    {
         return view('admin.demo');
    }
}
