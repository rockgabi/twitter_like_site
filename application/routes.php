<?php

/*
 * Named Routes: Just for naming purposes
 * 
 */
Route::get('account/register', array('as' => 'register', 'uses' => 'account@register'));
Route::get('account/login', array('as' => 'login', 'uses' => 'account@login'));
Route::get('resources/(:any)', array('as' => 'resourceAdd', 'uses' => 'resources@index'));
Route::delete('resources/(:any)', array('as' => 'resourceDelete', 'uses' => 'resources@index'));

/*
 * Controller Routes
 *
 */
Route::controller('account');
Route::controller('home');
Route::controller('resources');
Route::controller('profile');




/*
 * Other Routing
 *
 */

// Friendly login alias redirection
Route::any('login', function() {
	return Redirect::to('account/login');
});

// Logout route
Route::any('logout', function() {
	Auth::logout();
	return Redirect::to('account/login');
});

// Sets the language in a cookie
Route::any('lang/(:any)', function($lang) {
	if (in_array($lang, Config::get('application.languages'))) {
		if (Cookie::has('language')) {
			Cookie::forget('language');
		}
		Cookie::forever('language', $lang);
	} else {
		Cookie::forever('language', 'sp');
	}

	Config::set('application.language', Cookie::get('language'));

	return Redirect::to('home');
});

/*
 * Composers
 * 
 */



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

// Filtro: Si es invitado, redirigir al login
Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('account/login');
});