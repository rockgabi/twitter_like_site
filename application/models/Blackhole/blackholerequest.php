<?php

class BlackholeRequest extends Eloquent {
	public static $table = 'relationship_request';

	/**
	 * Get all the request of type $type for the specific user $user_id
	 * @param  string $type    	type of relationship, this suits with a column in the relationship_request table
	 * @param  int $user_id 	the user_id for which we are finding it's incoming requests
	 * @return Array          	The Array representation of the response row
	 */
	public static function getAll($type, $user_id) {

		$resp = DB::table(BlackholeRequest::$table)
			->where('user1_id', '=', $user_id)
			->join('users', 'relationship_request.user2_id', '=', 'users.id')
			->get(array(
				'user2_id as userId',
				'username as userName',
				'type',
				'requested_at'
			));
			
		return $resp;
	}

	/**
	 * Accepts the request for the $user_id from the $user2_id of type $type
	 * 
	 * @param  string 	$type     	The type of the request
	 * @param  int 		$user1_id 	The target user id of the request
	 * @param  int 		$user2_id 	The target user id of the request
	 * @return boolean           	Return whether the accept request operation was satisfactory
	 */
	public static function accept($type, $user1_id, $user2_id) {
		if (BlackholeRequest::existsRequest($type, $user1_id, $user2_id)) {
			BlackholeRequest::removeRequest($type, $user1_id, $user2_id, true);
			return Relationship::addRelationship($type, $user1_id, $user2_id, true);
		}
			return false;
	}

	/**
	 * Checks if the specified request exists.
	 * 
	 * @param  string 	$type     	The type of the request
	 * @param  int 		$user1_id 	The target user id of the request
	 * @param  int 		$user2_id 	The user id of the request performer
	 * @return boolean           	Return whether the request exists
	 */
	public static function existsRequest($type, $user1_id, $user2_id) {
		$resp = DB::table(BlackholeRequest::$table)
			->where('user1_id', '=', $user1_id)
			->where('user2_id', '=', $user2_id)
			->where('type', '=', $type)
			->get();

		if (sizeof($resp) > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Remove the specified requests from the request table, could be a bidirectional operation
	 * 
	 * @param  string  	$type          	The type of the request
	 * @param  int  	$user1_id      	The target user id of the request
	 * @param  int  	$user2_id      	The user id of the request performer
	 * @param  boolean 	$bidirectional 	Wether it should try to remove both direction request
	 * @return void
	 */
	public static function removeRequest($type, $user1_id, $user2_id, $bidirectional = false) {
		DB::table(BlackholeRequest::$table)
			->where('user1_id', '=', $user1_id)
			->where('user2_id', '=', $user2_id)
			->where('type', '=', $type)
			->delete();

		if ($bidirectional) {
			DB::table(BlackholeRequest::$table)
			->where('user2_id', '=', $user2_id)
			->where('user1_id', '=', $user1_id)
			->where('type', '=', $type)
			->delete();
		}
	}

	/**
	 * Declines a request, it could includ extra logic from removeRequest, like Blacklisting
	 * 
	 * @param  string 		$type     	The type of the request
	 * @param  int 			$user1_id 	The user_id of the target service
	 * @param  int 			$user2_id 	The user_id of the solicitant of the request
	 * @return array()           		Response Array of the operation
	 */
	public static function decline($type, $user1_id, $user2_id) {
		BlackholeRequest::removeRequest($type, $user1_id, $user2_id);
		// By now it's only a removeRequest, probably in the future, we could implement a 'Blacklist' for this
		$resp = array(
			'success' 	=> true,
			'errors'	=> array()
		);
		return $resp;
	}

}