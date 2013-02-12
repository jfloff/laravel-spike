<?php

class UrlController extends BaseController {

	public function __construct() {
		$this->beforeFilter('apiauth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * $ curl laravel-spike.dev:8888/api/v1/url
	 * $ curl --user firstuser:first_password laravel-spike.dev:8888/api/v1/url
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//Formerly: return 'Hello, API';
	    $urls = Url::where('user_id', Auth::user()->id)->get();
	    return Response::json([
	          'error' => false,
	          'urls' => $urls->toArray()],
	          201
	      );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * $ curl --user firstuser:first_password -d 'url=http://google.com&description=A Search Engine' laravel-spike.dev:8888/api/v1/url
	 * $ curl --user firstuser:first_password -d 'url=http://fideloper.com&description=A Great Blog' laravel-spike.dev:8888/api/v1/url
	 * $ curl --user seconduser:second_password -d 'url=http://digitalsurgeons.com&description=A Marketing Agency' laravel-spike.dev:8888/api/v1/url
	 * $ curl --user seconduser:second_password -d 'url=http://www.poppstrong.com/&description=I feel for him' laravel-spike.dev:8888/api/v1/url
	 *
	 * @return Response
	 */
	public function postStore()
	{
		$input = Input::json(true);

		$url = new Url;
	    $url->url = $input['url'];
	    $url->description = $input['description'];
	    $url->user_id = Auth::user()->id;
	    // Validation and Filtering is sorely needed!!
	    // Seriously, I'm a bad person for leaving that out.
	    $url->save();
	    return Response::json([
	            'error' => false,
	            'message' => 'URL created'],
	            201
	        );
	}

	/**
	 * Display the specified resource.
	 *
	 * $ curl --user firstuser:first_password laravel-spike.dev:8888/api/v1/url
	 * $ curl --user firstuser:first_password laravel-spike.dev:8888/api/v1/url/2
	 *
	 * @return Response
	 */
	public function getShow($id)
	{
		// Make sure current user owns the requested resource
	    $url = Url::where('user_id', Auth::user()->id)
	            ->where('id', $id)
	            ->take(1)
	            ->get();

	    return Response::json([
	          'error' => false,
	          'urls' => $url->toArray()],
	          200
	      );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * curl -X PUT --user seconduser:second_password -d 'url=http://yahoo.com' laravel-spike.dev:8888/api/v1/url/3
	 * curl --user seconduser:second_password laravel-spike.dev:8888/api/v1/url/3
	 *
	 * @return Response
	 */
	public function putUpdate($id)
	{
		$url = Url::where('user_id', Auth::user()->id)->find($id);
		$input = Input::json(true);

	    if ( isset($input['url']) )
	    {
	        $url->url = $input['url'];
	    }
	    if ( isset($input['description']) )
	    {
	        $url->description = $input['description'];
	    }
	    $url->save();
	    return Response::json([
	          'error' => false,
	          'message' => 'url updated'],
	          200
	      );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * curl -X DELETE --user firstuser:first_password laravel-spike.dev:8888/api/v1/url/2
	 *
	 * @return Response
	 */
	public function deleteDestroy($id)
	{
		$url = Url::where('user_id', Auth::user()->id)->find($id);
	    $url->delete();
	    return Response::json([
	          'error' => false,
	          'message' => 'url deleted'],
	          200
	      );
	}

}
