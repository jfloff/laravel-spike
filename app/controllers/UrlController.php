<?php

class UrlController extends BaseController {

	/**
	 * Returns Hello to the user
	 *
	 * @return Response
	 */
	public function postHello()
	{
		$input = Input::json(true);

		$helloService = new HelloService($input['name']);

	    return Response::json(
	    		[
		            'error' => false,
		            'name' => $helloService->getHello()
	            ],
	            202
	        );
	}

	/**
	 * Returns Bye to the user
	 *
	 * @return Response
	 */
	public function postBye()
	{
		$input = Input::json(true);

		$byeService = new ByeService($input['name']);

	    return Response::json(
	    		[
		            'error' => false,
		            'name' => $byeService->getBye()
	            ],
	            202
	        );
	}
}
