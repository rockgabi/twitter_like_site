<?php

class Request_Controller extends Base_Controller {
	
	/**
	 * Gets all the relationship request of type $type for the user $user_id
	 * @param  string $type    The type of the relationship request
	 * @param  int 	  $user_id The id of the user to query for
	 * @return JSON   
	 */
	public function action_getAll($type, $user_id) {

		if ($user_id != Auth::user()->attributes['id']) {
			return json_encode(array('Error, logged user and user requested operation doesn\'t match'));
		}

		$resp = BlackholeRequest::getAll($type, $user_id);

		return json_encode($resp);
	}

	public function action_accept($type, $user1_id, $user2_id) {
		if ($user1_id != Auth::user()->attributes['id']) {
			return json_encode(array('Error, logged user and user requested operation doesn\'t match'));
		}

		$resp = BlackholeRequest::accept($type, $user1_id, $user2_id);

		return $resp;
	}

	public function action_decline($type, $user1_id, $user2_id) {
		if ($user1_id != Auth::user()->attributes['id']) {
			return json_encode(array('Error, logged user and user requested operation doesn\'t match'));
		}

		$resp = BlackholeRequest::decline($type, $user1_id, $user2_id);

		return json_encode($resp);
	}

}