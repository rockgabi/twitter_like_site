<?php

class Create_Relationship_Model {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_relationship', function($table) {
			$table->increments('id');
			$table->timestamp('related_started_at');
			$table->integer('user1_id')->unsigned();
			$table->integer('user2_id')->unsigned();
			$table->string('type');
			// Foreign keys:
			$table->foreign('user1_id')->references('id')->on('users')->on_delete('no action');
			$table->foreign('user2_id')->references('id')->on('users')->on_delete('no action');
		});

		Schema::create('relationship_request', function($table) {
			$table->increments('id');
			$table->timestamp('requested_at');
			$table->integer('user1_id')->unsigned();
			$table->integer('user2_id')->unsigned();
			$table->string('type');
			// Foreign Keys
			$table->foreign('user1_id')->references('id')->on('users')->on_delete('no action');
			$table->foreign('user2_id')->references('id')->on('users')->on_delete('no action');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_relationship');
		Schema::drop('relationship_request');
	}

}