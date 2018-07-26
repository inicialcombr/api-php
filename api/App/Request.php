<?php

/**
 * @see Settings
 */
require_once 'Settings.php';

/**
 * Request
 */
class Request
{
	/**
	 * @var array
	 */
	private $__post;

	/**
	 * @var array
	 */
	private $__get;

	/**
	 * @var array
	 */
	private $__request;

	/**
	 * @var array
	 */
	private $__server;

	/**
	 * @return Api\Request
	 */
	public function __construct()
	{
		$this->__post    = (array) @$_POST;
		$this->__get     = (array) @$_GET;
		$this->__request = (array) @$_REQUEST;
		$this->__server  = (array) @$_SERVER;

		return $this;
	}

	/**
	 * @param  string $param
	 * @param  string $method (GET, POST, REQUEST, SERVER)
	 * @return mixed
	 */
	public function getParam($param = null, $method = null)
	{
		switch (strtoupper($method))
		{
			case 'GET':

				if (empty($param)) {
					return $this->__get;
				}

				if (!empty($param) && isset($this->__get[$param])) {
					return $this->__get[$param];
				}

				return null;

				break;

			case 'POST':

				if (empty($param)) {
					return $this->__post;
				}

				if (!empty($param) && isset($this->__post[$param])) {
					return $this->__post[$param];
				}

				return null;

				break;

			case 'REQUEST':

				if (empty($param)) {
					return $this->__request;
				}

				if (!empty($param) && isset($this->__request[$param])) {
					return $this->__request[$param];
				}

				return null;

				break;

			case 'SERVER':

				if (empty($param)) {
					return $this->__server;
				}

				if (!empty($param) && isset($this->__server[$param])) {
					return $this->__server[$param];
				}

				return null;

				break;

			default:

				if (empty($param)) {
					return $this->__request;
				}

				if (!empty($param) && isset($this->__request[$param])) {
					return $this->__request[$param];
				}

				return null;

				break;
		}
	}

	/**
	 * @param  string $param
	 * @param  string $method
	 * @return mixed
	 */
	public static function param($param = null, $method = null)
	{
		$request = new Request();

		return $request->getParam($param, $method);
	}
}