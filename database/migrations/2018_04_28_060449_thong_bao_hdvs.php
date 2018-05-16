<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThongBaoHdvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_bao_hdvs', function (Blueprint $table) {
            $table->integer('tour_id')->references('id')->on('tour_du_lichs')->onDelete('cascade');
            $table->integer('hdv_id')->references('user_id')->on('huong_dan_viens')->onDelete('cascade');
            $table->string('noi_dung_tb');
            $table->timestamp('thoi_gian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thong_bao_hdvs');
    }
}
