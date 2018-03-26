<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongtTourTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('congty_tours', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('tour_id')->references('id')->on('tour_du_lichs')->onDelete('cascade');
			$table->integer('congty_id')->references('id')->on('cong_tys')->onDelete('cascade');
			$table->string('yeu_cau');
			$table->string('thu_lao');
			$table->integer('so_luong_huongdv');
			$table->string('nguoi_lien_he');
			$table->string('email_lien_he');
			$table->datetime('thoi_gian_bat_dau');
			$table->datetime('thoi_gian_ket_thuc');
			$table->datetime('han_dang_ky');
			$table->string('mo_ta')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('congty_tours');
	}
}
