<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as OrderAdminController;
use App\Http\Controllers\Admin\CategoriesAdminController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
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



///Admin

Route::name('admin.')->prefix('admin')->group(function() {

    Route::get('/login', [AdminController::class, 'getLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'postLogin'])->name('login.post');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('logout');
    
 
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/demoAdmin',[AdminController::class,'demoAdmin'])->name('demoAdmin');
         //Order Admin
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/order',[OrderAdminController::class,'index'])->name('order');
        Route::get('/order-confirm',[OrderAdminController::class,'store'])->name('order.confirm');
        Route::get('/order-store',[OrderAdminController::class,'store'])->name('store');
        Route::get('/update-order/{id}',[OrderAdminController::class,'update_order'])->name('update.order');
        Route::get('/add-order/{id}/{user}',[OrderAdminController::class,'add_order'])->name('add.order');
        Route::get('/create-order',[OrderAdminController::class,'create'])->name('order.create');
        Route::post('/information-order',[OrderAdminController::class,'information'])->name('order.information');
        Route::post('/save-information-order',[OrderAdminController::class,'save_information'])->name('order.information.save');
        Route::get('/order-offline/{id}',[OrderAdminController::class,'order_offline'])->name('order.offline');
        Route::get('/add-order-offline',[OrderAdminController::class,'add_order_offline'])->name('add.order.offline');
        Route::get('/confirm-order-offline/{id}/{action}',[OrderAdminController::class,'confirm_order_offline'])->name('confirm.order.offline');
        Route::get('/order-offline-history',[OrderAdminController::class,'order_offline_history'])->name('order.offline.history');
        Route::get('/statistical',[OrderAdminController::class,'statistical'])->name('statistical');

        //Product
        Route::get('/all-products',[ProductController::class,'index'])->name('all_products');
        Route::get('/add-products',[ProductController::class,'add'])->name('add_products');
        Route::post('/add-products',[ProductController::class,'store'])->name('store.product');
        Route::get('/edit/{id}',[ProductController::class,'show'])->name('edit');
        Route::post('/edit-products/{id}',[ProductController::class,'update'])->name('update.product');


       
        // Categories
        Route::name('categories.')->prefix('categories')->group(function() {
                Route::get('/',[CategoriesAdminController::class,'index'])->name('all');
                Route::get('/add',[CategoriesAdminController::class,'get_add'])->name('add');
                Route::post('/add',[CategoriesAdminController::class,'store'])->name('store');
                Route::get('/edit/{id}',[CategoriesAdminController::class,'show'])->name('show');
                Route::post('/edit/{id}',[CategoriesAdminController::class,'update'])->name('update');   
        });
       
    });
});