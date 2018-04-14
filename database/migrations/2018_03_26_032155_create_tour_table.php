<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tour_du_lichs', function (Blueprint $table) {
			$table->increments('id');

			$table->string('dia_diem');
			$table->string('lich_trinh')->nullable();
			$table->string('so_luong_khach');
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
		Schema::dropIfExists('tour_du_lichs');
	}
}
