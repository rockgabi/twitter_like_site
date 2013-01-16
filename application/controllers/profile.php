<?php

class Profile_Controller extends Base_Controller {


	public function action_index() {
		$user_id = Auth::user()->attributes['id'];
		$user = User::find($user_id);
	
		$view = View::make('profile.profile');
		$view['username'] = $user->get_attribute('username');
		$view['created_at'] = $user->get_attribute('created_at');
		
		$view['resources_num'] = sizeof($user->resources());
		return $view;
	}
}