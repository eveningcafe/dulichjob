<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuongdvTourTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('huongdv_tours', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tour_id')->references('id')->on('tour_du_lichs')->onDelete('cascade');
			$table->integer('huongdv_id')->references('id')->on('huong_dan_viens')->onDelete('cascade');
			$table->string('loi_gioi_thieu')->nullable();
			$table->datetime('ngay_dang_ky');
			$table->string('tinh_trang')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('huongdv_tours');
	}
}
