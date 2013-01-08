<?php

class Home_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
		// Requires authentication
		$this->filter('before', 'auth');
		Asset::add('modernizr', 'js/vendor/modernizr-2.6.2.min.js');
		Asset::add('css_reset', 'css/normalize.css');
		Asset::add('css_style', 'css/main.css');
	}

	public function action_index()
	{

		$view = View::make('home.index');
		$view->nest('footer', 'partials.footer');
		return $view;
	}

}