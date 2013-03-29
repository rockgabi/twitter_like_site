<?php

class Relationship extends Eloquent {
	public static $table = 'user_relationship';

	/**
	 * Returns the relations of type $type for the user $user_id
	 * 
	 * @param  string $type    The type of the relation
	 * @param  string $user_id The user id
	 * @return Array           Return the relations of type $type for the user $user_id
	 */
	public static function relations($type, $user_id) {
		// TODO: this assumes bidirectional relations, re-touch for both bidirectional or unidirectional support
		$result = DB::table(Relationship::$table)
			->where('user1_id', '=', $user_id)
			->where('type', '=', $type)
			->join('users', 'users.id', '=', 'user_relationship.user2_id')
			->get(array(
				'user_relationship.*', 'users.username'
			));

		return $result;
	}

	/**
	 * Insert in the database the new relationship of type $type for the user $user1_id respect $user2_id
	 * This could be stored twice in reverse if the operation is $bidirectional
	 * 
	 * @param 	string  	$type          		The relationship type
	 * @param 	int  		$user1_id      		The target user id
	 * @param 	int  		$user2_id      		The related user id
	 * @param 	boolean 	$bidirectional 		Decides whether to store twice the row in reverse.
	 * @return 	boolean 						Returns the success of the add operation
	 */
	public static function addRelationship($type, $user1_id, $user2_id, $bidirectional = false) {
		// Only perform the operation if the relationshipt does not exists
		if (!Relationship::existRelationship($type, $user1_id, $user2_id)) {
			DB::table(Relationship::$table)
				->insert(array(
					'user1_id' => $user1_id,
					'user2_id' => $user2_id,
					'type' => $type,
				));
			// Bidirectional logic
			if ($bidirectional && !Relationship::existRelationship($type, $user2_id, $user1_id)) {
				DB::table(Relationship::$table)
				->insert(array(
					'user1_id' => $user2_id,
					'user2_id' => $user1_id,
					'type' => $type,
				));
			}

			return true;
		}
		return false;
	}

	public static function removeRelationship($type, $user1_id, $user2_id) {
		$resp = DB::table(Relationship::$table)
				->where('user1_id', '=', $user1_id)
				->where('user2_id', '=', $user2_id)
				->where('type', '=', $type)
				->delete();
		var_dump($resp);
	}

	/**
	 * Checks whether the relationship exists or not in the table, unidirectional ONLY
	 * 
	 * @param  string 	$type     	The relationship type
	 * @param  int 		$user1_id 	The target user id
	 * @param  int 		$user2_id 	The related user id
	 * @return boolean           	Relationship exists
	 */
	public static function existRelationship($type, $user1_id, $user2_id) {
		$resp = DB::table(Relationship::$table)
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

}