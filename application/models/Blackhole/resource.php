<?php

class Resource extends Eloquent {

	public static function resources($user_id) {
		$user = User::find($user_id);
		return $user->has_many('Resource', 'user_id')->results();
	}
}