<?php

/**
 * Welcome API
 */
$app->route('/welcome/', function($request, $response) {

	try {

		$name = $request->getParam('name');
		$name = !$name ? 'friend' : $name;

		$data = array (
			'welcome_message'  => "Welcome, {$name}!",
		);

		$response->setData($data);

	} catch (Exception $data) {

		$response->setData   ($data);
		$response->setStatus (false);
		$response->setCode   (400);
		$response->setMessage($data->getMessage());
	}

	$response->json();
});
