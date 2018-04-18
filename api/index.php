<?php

/**
 * @see App
 */
require 'App/App.php';

/**
 * Initialize App Instance
 */
$app = new App();
$app->load('Route/');

/**
 * Index / Fallback API
 */
$app->route('/', function($request, $response) {

	$data = array (
		'version' => Settings::VERSION
	);

	$response->setData	 ($data);
	$response->setStatus (true);
	$response->setMessage('Response message!');
	$response->send();
});
