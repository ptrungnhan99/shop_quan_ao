<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SliderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
  });

Route::get('/',[HomeController::class,'index']);

Route::get('admin/user/login',[LoginController::class,'index'])->name('login');

Route::post('admin/user/login',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('admin/main',[MainController::class,'index'])->name('admin');
});

Route::prefix('slider')->group(function () {
    Route::get('', [SliderController::class,'index']);
    Route::get('{id}', [SliderController::class,'show'])->where('id','[0-9]+');
    Route::get('cap-nhat/{id}', [SliderController::class,'edit']);
    Route::put('cap-nhat/{id}', [SliderController::class,'update']);
    Route::get('them', [SliderController::class,'create']);
    Route::post('them', [SliderController::class,'store']);
    Route::delete('xoa/{id}', [SliderController::class,'destroy']);
});

Route::prefix('banner')->group(function () {
    Route::get('', [BannerController::class,'index']);
    Route::get('{id}', [BannerController::class,'show'])->where('id','[0-9]+');
    Route::get('cap-nhat/{id}', [BannerController::class,'edit']);
    Route::put('cap-nhat/{id}', [BannerController::class,'update']);
    Route::get('them', [BannerController::class,'create']);
    Route::post('them', [BannerController::class,'store']);
    Route::delete('xoa/{id}', [BannerController::class,'destroy']);
});

Route::prefix('san-pham')->group(function () {
    Route::get('', [SanPhamController::class,'index']);
    Route::get('nu', [SanPhamController::class,'productWomen']);
    Route::get('nam', [SanPhamController::class,'productMen']);
    Route::get('{id}', [SanPhamController::class,'productDetail'])->where('id','[0-9]+');
    Route::get('cap-nhat/{id}', [SanPhamController::class,'edit']);
    Route::put('cap-nhat/{id}', [SanPhamController::class,'update']);
    Route::get('them', [SanPhamController::class,'create']);
    Route::post('them', [SanPhamController::class,'store']);
    Route::delete('xoa/{id}', [SanPhamController::class,'destroy']);
});
Route::prefix('khach-hang')->group(function () {
    Route::post('add-to-cart/{id}', [KhachHangController::class,'AddToCart']);
    Route::get('info-cart',[KhachHangController::class,'InfoCart']);

});
