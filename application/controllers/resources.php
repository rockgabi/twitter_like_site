<?php

class Resources_Controller extends Base_Controller {

	public $restful = true;


	public function __construct() {
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function get_index($id = null)
	{
		if ($id != null) {
			return $this->get_single($id);
		}
		$user_id = Auth::user()->attributes['id'];
		$input = Input::json();
		return json_encode(DB::table('resources')->where('user_id', '=', $user_id)->order_by('time', 'desc')->get());
	}

	/**
	 * Guarda un nuevo recurso creado
	 *
	 * @return Response
	 */
	public function post_index()
	{

		$input = Input::json();
		if (strtotime($input->time) === false) {
			return '0';
		} else {
			$user_id = Auth::user()->attributes['id'];
			return json_encode(Resource::create(
				array(
					'time' => date('Y-m-d H:i:s',strtotime($input->time)),
					'resource' => $input->resource,
					'user_id' => $user_id
				)
			)->attributes);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function get_single($id)
	{

		return Resource::find($id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function delete_index($id)
	{
		$resource = Resource::find($id)->delete();
	}

}