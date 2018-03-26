<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanphongTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('van_phongs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('congty_id')->references('id')->on('cong_tys')->onDelete('cascade');
			$table->string('dia_chi');
			$table->string('email');
			$table->integer('so_dien_thoai');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('van_phongs');
	}
}
