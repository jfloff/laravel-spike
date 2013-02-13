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

		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);
		Queue::push('HelloService', ['name' => $input['name']]);

	    return Response::json(
	    		[
		            'error' => false
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

		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);
		Queue::push('ByeService', ['name' => $input['name']]);

	    return Response::json(
	    		[
		            'error' => false
	            ],
	            202
	        );
	}
}
