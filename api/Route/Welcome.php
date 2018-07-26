<?php

/**
 * Welcome API
 */
$app->route('/welcome/', function($request, $response) {

	try {

		// throw new Exception("Error Processing Request", 1);

		$name = $request->getParam('name');
		$name = !$name ? 'friend' : $name;

		$data = array (
			'welcome_message'  => "Welcome, {$name}!",
		);

		$response->setData($data);

	} catch (Exception $data) {

		$response->setSuccess (false);
		$response->setMessage ($data->getMessage());
		$response->setHttpCode(400);
	}

	$response->json();
});
