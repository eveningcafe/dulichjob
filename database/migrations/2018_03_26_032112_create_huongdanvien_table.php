<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuongdanvienTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('huong_dan_viens', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('ten');
			$table->string('gioi_tinh');
			$table->integer('so_dien_thoai_1')->nullable();
			$table->integer('so_dien_thoai_2')->nullable();
			$table->string('kinh_nghiem')->nullable();
			$table->string('hoc_van')->nullable();
			$table->string('noi_lam_viec');
			$table->string('ngoai_ngu')->nullable();
			$table->string('chung_chi')->nullable();
			$table->string('tu_gioi_thieu')->nullable();
			$table->string('avatar_url')->default('img/default-placeholder.png');;
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('huong_dan_viens');
	}
}
