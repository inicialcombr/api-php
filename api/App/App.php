<?php

/**
 * @see Settings
 */
require_once 'Settings.php';

/**
 * @see Request
 */
require_once 'Request.php';

/**
 * @see Response
 */
require_once 'Response.php';

/**
 * App
 */
class App
{
	/**
	 * @var string
	 */
	private $__routeUri;

	/**
	 * @return void
	 */
	public function __construct()
	{
		$this->__setRouteUri();
	}

	/**
	 * @return void
	 */
	private function __setRouteUri()
	{
		// SERVER

		$phpSelf     = $_SERVER['PHP_SELF'];
		$queryString = $_SERVER['QUERY_STRING'];
		$requestUri  = $_SERVER['REQUEST_URI'];

		// BASE URI

		$phpSelf     = $_SERVER['PHP_SELF'];
		$phpSelfData = explode('/', $phpSelf);
		$phpFileName = end($phpSelfData);

		$baseUri = str_replace($phpFileName, '', $phpSelf);

		// ROUTE URI

		$this->__routeUri = '/'.str_replace(array($baseUri, $queryString,'?'), '', $requestUri);
	}

	/**
	 * @param  string $route
	 * @param  function $callback
	 * @return mixed
	 */
	public function route($route, $callback)
	{
		if (strpos($this->__routeUri, $route) === 0) {
			if (is_callable($callback)) {
				return $callback(new Request(), new Response());
			}
		}
	}

	/**
	 * @param  string $path
	 * @return void
	 */
	public function load($path)
	{
		$app = $this;

		if (is_dir($path)) {
			foreach (scandir($path) as $item) {
				if (is_file($path.$item)) {
					require_once $path.$item;
				}
			}
		}

		if (is_file($path)) {
			require_once $path;
		}
	}
}