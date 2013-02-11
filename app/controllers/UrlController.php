<?php

class UrlController extends BaseController {

	public function __construct() {
		$this->beforeFilter('apiauth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
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
	 * @return Response
	 */
	public function store()
	{
		$url = new Url;
	    $url->url = Request::get('url');
	    $url->description = Request::get('description');
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
	 * @return Response
	 */
	public function show($id)
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
	public function update($id)
	{
		$url = Url::where('user_id', Auth::user()->id)->find($id);
	    if ( Request::get('url') )
	    {
	        $url->url = Request::get('url');
	    }
	    if ( Request::get('description') )
	    {
	        $url->description = Request::get('description');
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
	 * curl -X DELETE --user firstuser:first_password laravel-spike.dev:8888/api/v1/url/2
	 * @return Response
	 */
	public function destroy($id)
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
