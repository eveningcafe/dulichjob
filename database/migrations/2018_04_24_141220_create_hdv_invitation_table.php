<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHdvInvitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdv_invitation', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('congty_id')->references('id')->on('cong_tys')->onDelete('cascade');
            $table->integer('tour_id')->references('id')->on('tour_du_lichs')->onDelete('cascade');
            $table->integer('huongdv_id')->references('id')->on('huong_dan_viens')->onDelete('cascade');
            $table->string('ghi_chu');
            $table->string('trang_thai');

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
        Schema::dropIfExists('hdv_invitation');
    }
}
