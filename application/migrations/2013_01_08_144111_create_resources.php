<?php

class Create_Resources {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resources', function($table) {
			$table->increments('id');
			$table->timestamp('time');
			$table->text('resource');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->integer('user_id')->unsigned(); // Hace referencia a un id 
			// autoincrementador, por lo que no es integer, sino integer 
			// unsigned, presentaba un problema cuando se lo hacia foreign key.
			
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resources');
	}

}