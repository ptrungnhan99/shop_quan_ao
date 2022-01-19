<?php

namespace App\Providers;

use App\Models\SanPham;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $dssp = SanPham::where('trang_thai',1)->orderBy('created_at','desc')->take(4)->get();
        View::share('spmoi', $dssp);
    }
}
