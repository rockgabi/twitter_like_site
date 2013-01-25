<?php

class Profile_Controller extends Base_Controller {


	public function action_index() {
		$user_id = Auth::user()->attributes['id'];
		$user = User::find($user_id);
	
		$profile = array();
		$profile['username'] = $user->get_attribute('username');
		$profile['created_at'] = $user->get_attribute('created_at');
		$profile['resources_num'] = sizeof($user->resources());

		return json_encode($profile);
	}
}