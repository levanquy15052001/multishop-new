<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;


/// User
// Route::get('/send-mail', [HomeController::class, 'send_mail'])->name('send_mail');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/register', [RegisterController::class,'show'])->name('register.show');
Route::post('/register', [RegisterController::class,'register'])->name('register.perform');
Route::get('/login',[LoginController::class,'show'])->name('login.show');
Route::post('/login', [LoginController::class,'login'])->name('login.perform');
Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');
Route::get('/details/{id}',[HomeController::class,'show'])->name('details');
Route::get('/sum_order', [HomeController::class, 'sum_order'])->name('sum_order');
Route::get('/pdf/{id}',[HomeController::class,'pdf_bill'])->name('pdf_bill');


Route::group(['middleware' => ['checkuser']], function () {
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::get('/order/{id}',[OrderController::class,'order'])->name('order.action');
    Route::get('/action',[OrderController::class,'action'])->name('action');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::post('/payment',[CheckoutController::class,'payment'])->name('payment');
    Route::get('/payment',[CheckoutController::class,'payment_show'])->name('payment.show');
    
});



// ///Admin

Route::name('admin.')->prefix('admins')->group(function() {

    Route::get('/login', [AdminController::class, 'getLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'postLogin'])->name('login.post');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('logout');

    Route::group(['middleware' => 'adminauth'], function () {

        Route::get('/',[AdminHomeController::class,'index'])->name('index');

        //Categories
        Route::name('categories.')->prefix('categories')->group(function() {

            Route::get('/',[CategoriesController::class,'index'])->name('index');
            Route::get('/create',[CategoriesController::class,'create'])->name('create');
            Route::get('/edit',[CategoriesController::class,'edit'])->name('edit');
            Route::get('/destroy',[CategoriesController::class,'destroy'])->name('destroy');
            
        });
    });

 
});

