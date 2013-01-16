<?php

class Home_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
		// Requires authentication
		$this->filter('before', 'auth');
		Asset::add('modernizr', 'js/vendor/modernizr-2.6.2.min.js');
	}

	public function action_index()
	{

		$view = View::make('home.index');
		$view->nest('footer', 'partials.footer');
		return $view;
	}

}