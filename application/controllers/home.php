<?php

class Home_Controller extends Base_Controller {

	public function __construct() {
		parent::__construct();
		// Requires authentication
		$this->filter('before', 'auth');
		Asset::add('modernizr', 'js/vendor/modernizr-2.6.2.min.js');
	}

	/**
	 * Renders the main application. Passes the information
	 * necesary for the client application to work independently
	 * from the server.
	 *
	 * Uses home.index view
	 * 
	 * @return [type] [description]
	 */
	public function action_index()
	{
		// Data for the view
		$data = array(
			'connector' => Config::get('connector')
		);
		
		$view = View::make('home.index', $data);
		$view->nest('footer', 'partials.footer');
		return $view;
	}

}