<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('post_id');
			$table->integer('user_id');
			$table->string('user_name');
			$table->string('post_title');
			$table->string('post_data');
			$table->string('post_image');
			$table->timestamp('post_create_date');
			$table->timestamp('post_update_date');
			$table->dateTime('post_expire_date');
			$table->boolean('is_visible');
			$table->boolean('is_active');
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
		Schema::drop('posts');
	}

}
