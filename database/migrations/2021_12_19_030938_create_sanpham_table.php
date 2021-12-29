<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sp',100);
            $table->integer('ma_loai');
            $table->integer('ma_thuong_hieu');
            $table->string('mo_ta_tom_tat',500);
            $table->text('chi_tiet');
            $table->double('gia');
            $table->string('hinh1',200);
            $table->string('hinh2',200);
            $table->string('hinh3',200);
            $table->tinyInteger('trang_thai');
            $table->tinyInteger('gioi_tinh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
