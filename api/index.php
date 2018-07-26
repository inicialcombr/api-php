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
$app->route('ALL', '/', function($request, $response) {

	$data = array (
		'version' => Settings::VERSION
	);

	$response->setData	  ($data);
	$response->setSuccess (false);
	$response->setHttpCode(400);
	$response->json();
});
