<?php

class Relations_Controller extends Base_Controller {
	public $restful = true;

	public function __construct() {

	}

	/**
	 * Get the requested relations from the user $id, of type $type
	 * @param  string $type Relationship type, example: friend
	 * @param  int $id   	The user id for which we want to find the relations
	 * @return json       	A JSON representation of the relations
	 */
	public function get_index($type, $id) {
		// Service requested is not from the logged user?
		if ($id != Auth::user()->attributes['id']) {
			return json_encode(array());
		}
		// User object
		$user = User::find($id);
		// Get the requested relations
		$relations = Relationship::relations($type, $id);
		// Return it
		return json_encode($relations);
	}

	public function post_index($type, $user1_id, $user2_id) {
		// This should be not allowed by now, only if the through BlackholeRequest
	}

	public function delete_index($type, $user1_id, $user2_id) {
		// This should be not allowed by now, only if the through BlackholeRequest
	}

}