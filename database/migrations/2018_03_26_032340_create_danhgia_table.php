<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhgiaTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('danh_gias', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('congty_id')->references('id')->on('cong_tys')->onDelete('cascade');

			$table->integer('tour_id')->references('id')->on('tour_du_lichs')->onDelete('cascade');

			$table->integer('huongdv_id')->references('id')->on('huong_dan_viens')->onDelete('cascade');
			$table->integer('so_diem');
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
		Schema::dropIfExists('danh_gias');
	}
}
