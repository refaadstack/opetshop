<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class,'index']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

route::middleware(['auth'])->group(function(){

    route::middleware(['admin'])->group(function(){        
        // route::get('/user',UserController::class,'index')->name('user.index');

        //product
        route::resource('product', ProductController::class);
        //category
        route::resource('category', CategoryController::class);
        //coupon
        route::get('/coupon',[CouponController::class,'index'])->name('coupon.index');
        route::get('/coupon/create',[CouponController::class,'create'])->name('coupon.create');
        route::get('/coupon/{id}/edit',[CouponController::class,'edit'])->name('coupon.edit');
        route::delete('/coupon/{id}/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');
        route::put('/coupon/{id}/update',[CouponController::class,'update'])->name('coupon.update');
        route::post('/coupon/store',[CouponController::class,'store'])->name('coupon.store');
        
        
        //banner
        route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
        route::get('/banner',[BannerController::class,'index'])->name('banner.index');
        route::get('/banner/{id}/edit',[BannerController::class,'edit'])->name('banner.edit');
        route::delete('/banner/{banner}/destroy',[BannerController::class,'destroy'])->name('banner.destroy');
        route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');

        //transaction
        route::get('/transaction',[TransactionController::class,'index'])->name('transaction.index');
        route::get('/transaction/{id}/edit',[TransactionController::class,'edit'])->name('transaction.edit');
        route::post('/transaction/{id}/update',[TransactionController::class,'update'])->name('transaction.update');
    });

    route::resource('user',UserController::class);
    route::get('my-profile/{id}',[ProfileController::class, 'myprofile'])->name('my-profile');
    route::post('my-profile/update/{id}',[ProfileController::class, 'update'])->name('my-profile.update');

    //transaction
    route::post('/checkout',[TransactionController::class, 'checkout'])->name('checkout');
    route::get('/checkout/success',[TransactionController::class, 'success']);
    route::get('/my-transaction',[TransactionController::class,'indexMy'])->name('my-transaction');
    route::get('/transaction/{id}/show',[TransactionController::class,'show'])->name('transaction.show');

   
    
    
    //cart
    route::post('/cart/{id}', [CartController::class, 'cartAdd'])->name('cart-add');
    route::get('/cart',[CartController::class,'show'])->name('cart');
    route::get('/cart/{id}/delete',[CartController::class,'destroy'])->name('cart.delete');

    
    //cartCoupon
    route::get('/apply',[TransactionController::class,'applyVoucher'])->name('apply.voucher');
    


});


require __DIR__.'/auth.php';