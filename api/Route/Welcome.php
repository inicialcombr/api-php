<?php

/**
 * Welcome API
 */
$app->route('/welcome', function($request, $response) {

	try {

		$name = $request->getParam('name');
		$name = !$name ? 'friend' : $name;

		$data = array (
			'welcome_message'  => "Welcome, {$name}!",
		);

		$response->setData   ($data);
		$response->setStatus (true);
		$response->setMessage('Success!');

	} catch (Exception $data) {

		$response->setData   ($data);
		$response->setStatus (false);
		$response->setMessage($data->getMessage());
	}

	$response->send();
});
