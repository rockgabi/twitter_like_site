<?php

class Account_Controller extends Base_Controller {

	public $restful = true;

	public $layout = 'layouts.common';

	public function __construct() {
		
	}

	public function get_register() {
		if (Auth::guest()) {
			return View::make('account.register');
		} else {
			Redirect::to('home');
		}
	}

	/**
	 * Presenta el formulario de Login
	 *
	 * @return mixed
	 */
	public function get_login() {
		if (Auth::guest()) {
			return View::make('account.login');
		} else {
			return Redirect::to('home');
		}
	}

	/**
	 *	Handles registration
	 */
	public function post_register() {

		$input = Input::all();
		$rules = array(
			'username' => 'required',
			'password' => 'required',
			'password_repeat' => 'required|same:password'
		);
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			return Redirect::to('account/register')->with_errors($validation);
		}
		// Instancia de mensajes, para retornar errores
		$messages = new Laravel\Messages;
		// Busco en base si existe el nombre de usuario, a través del modelo
		$user = User::where('username', '=', $input['username']);
		if ($user->first() != NULL) {
			$messages->add('username', __('forms.duplicate_username'));
			return Redirect::to('account/register')->with_errors($messages);
		}

		try {
			$new_user = new User();
			$new_user->username = $input['username'];
			$new_user->password = Hash::make($input['password']);
			$new_user->save();
			$messages->add('_generics', __('forms.success_register'));
		} catch(Exception $e) {
			// Error desconocido en el registro, en base de datos
			$messages->add('_generics', __('forms.error_register'));
			return Redirect::to('account/register')->with_errors($messages);
		}

		// Envio mensaje de success
		return Redirect::to('account/login')->with('messages', $messages);
	}

	/**
	 *	Handles login
	 */
	public function post_login() {
		$input = Input::all();
		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);
		$messages = array(
			'username_required' => __('validation.required', array('attribute' => __('forms.label_username'))),
			'password_required' => __('validation.required', array('attribute' => __('forms.label_password')))
		);

		$validation = Validator::make($input, $rules, $messages);
		if ($validation->fails()) {
			return Redirect::to('account/login')->with_errors($validation);
		}
	
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if ( Auth::attempt($credentials)) {
			return Redirect::to('home');
		} else {	// failure
			return Redirect::back()
				->with('login_errors', true)
				->with_input();
				// pass any error notifications
		}
	}

}