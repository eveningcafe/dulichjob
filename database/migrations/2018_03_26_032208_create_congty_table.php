<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongtyTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cong_tys', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('ten');
			$table->string('tu_gioi_thieu');
			$table->string('website_url');
			$table->string('avatar_url')->default('img/default-placeholder.png');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('cong_tys');
	}
}
