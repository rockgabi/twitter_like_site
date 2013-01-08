<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 128);
			$table->string('password', 64);
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});

		DB::table('users')->insert(array(
			'username' => 'Dexter',
			'password' => Hash::make('knife')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}