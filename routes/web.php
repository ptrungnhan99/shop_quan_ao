<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TinTucController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


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
//client
Route::prefix('/')->group(function () {
    Route::get('',[HomeController::class,'index']);
    Route::get('login', [HomeController::class,'login']);
    Route::post('login', [HomeController::class,'postLogin']);
    Route::get('logout', [HomeController::class,'logout']);
    Route::get('register', [HomeController::class,'register']);
    Route::post('register', [HomeController::class,'postRegister']);
});

// Route::get('admin/user/login',[LoginController::class,'index'])->name('login');

// Route::post('admin/user/login',[LoginController::class,'store']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('admin/main',[MainController::class,'index'])->name('admin');
//     // Route::get('san-pham/them', [SanPhamController::class,'create']);
// });

Route::prefix('user')->group(function(){
    Route::get('login',[LoginController::class,'login'])->name('user/login');
    Route::post('login',[LoginController::class,'postLogin']);

});

Route::prefix('san-pham')->group(function () {
    // Route::get('', [SanPhamController::class,'index']);
    Route::get('nu', [SanPhamController::class,'productWomen']);
    Route::get('nam', [SanPhamController::class,'productMen']);
    Route::get('viet-tien', [SanPhamController::class,'productViettien']);
    Route::get('pt2000', [SanPhamController::class,'productPT']);
    Route::get('yame', [SanPhamController::class,'productYaMe']);
    Route::get('blue-exchange', [SanPhamController::class,'productBlue']);
    Route::get('{chuoi}', [SanPhamController::class,'productDetail']);
    // Route::get('cap-nhat/{id}', [SanPhamController::class,'edit']);
    // Route::put('cap-nhat/{id}', [SanPhamController::class,'update']);
    // Route::get('them', [SanPhamController::class,'create']);
    // Route::post('them', [SanPhamController::class,'store']);
    // Route::delete('xoa/{id}', [SanPhamController::class,'destroy']);
});

Route::prefix('tin-tuc')->group(function () {
    Route::get('', [TinTucController::class,'blog']);
    Route::get('{string}', [TinTucController::class,'blogDetail']);
});

Route::prefix('khach-hang')->group(function () {
    Route::post('add-to-cart/{id}', [KhachHangController::class,'AddToCart']);
    Route::get('info-cart',[KhachHangController::class,'InfoCart']);
    Route::post('update-cart',[KhachHangController::class,'UpdateCart']);
    Route::get('delete-cart/{id}',[KhachHangController::class,'DeleteCart']);
    // Route::get('order-item', [KhachHangController::class,'AddNewCustomer']);
    Route::get('order-item/{id}', [KhachHangController::class,'store']);
    Route::get('order/{id}', [KhachHangController::class,'Order']);
});

//admin
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('main',[MainController::class,'index'])->name('admin');

    Route::prefix('user')->group(function(){
        Route::get('create',[LoginController::class,'create']);
        Route::post('create',[LoginController::class,'store']);
        Route::get('logout',[LoginController::class,'logout']);
    });

    Route::prefix('slider')->group(function () {
        Route::get('', [SliderController::class,'index']);
        Route::get('cap-nhat/{id}', [SliderController::class,'edit']);
        Route::put('cap-nhat/{id}', [SliderController::class,'update']);
        Route::get('them', [SliderController::class,'create']);
        Route::post('them', [SliderController::class,'store']);
        Route::delete('xoa/{id}', [SliderController::class,'destroy']);
    });

    Route::prefix('banner')->group(function () {
        Route::get('', [BannerController::class,'index']);
        Route::get('cap-nhat/{id}', [BannerController::class,'edit']);
        Route::put('cap-nhat/{id}', [BannerController::class,'update']);
        Route::get('them', [BannerController::class,'create']);
        Route::post('them', [BannerController::class,'store']);
        Route::delete('xoa/{id}', [BannerController::class,'destroy']);
    });

    Route::prefix('san-pham')->group(function () {
        Route::get('', [SanPhamController::class,'index']);
        // Route::get('nu', [SanPhamController::class,'productWomen']);
        // Route::get('nam', [SanPhamController::class,'productMen']);
        // Route::get('viet-tien', [SanPhamController::class,'productViettien']);
        // Route::get('pt2000', [SanPhamController::class,'productPT']);
        // Route::get('yame', [SanPhamController::class,'productYaMe']);
        // Route::get('blue-exchange', [SanPhamController::class,'productBlue']);
        // Route::get('{chuoi}', [SanPhamController::class,'productDetail']);
        Route::get('cap-nhat/{id}', [SanPhamController::class,'edit']);
        Route::put('cap-nhat/{id}', [SanPhamController::class,'update']);
        Route::get('them', [SanPhamController::class,'create']);
        Route::post('them', [SanPhamController::class,'store']);
        Route::delete('xoa/{id}', [SanPhamController::class,'destroy']);
    });
    Route::prefix('tin-tuc')->group(function () {
        Route::get('', [TinTucController::class,'index']);
        Route::get('cap-nhat/{id}', [TinTucController::class,'edit']);
        Route::put('cap-nhat/{id}', [TinTucController::class,'update']);
        Route::get('them', [TinTucController::class,'create']);
        Route::post('them', [TinTucController::class,'store']);
        Route::delete('xoa/{id}', [TinTucController::class,'destroy']);
    });
    Route::prefix('don-hang')->group(function () {
        Route::get('', [DonHangController::class,'index']);
        Route::get('cap-nhat/{id}', [DonHangController::class,'edit']);
        Route::put('cap-nhat/{id}', [DonHangController::class,'update']);
    });
});


