<?php

namespace core;

use core\View;

class Controller
{
	protected $data = [];

	protected $view;

	protected $layout = 'layout';

	public function __construct()
	{
		$this->view = new View();
	}

	public function render($subview, $data, $layout = true)
	{
		$prefix = $this->getPathPrefix();
		if ( $layout ) {
			$layout = $this->layout;
		}
		
		$this->view->render($prefix, $subview, $data, $layout);
	}

	private function getPathPrefix()
	{
		$parts = array_slice(explode('\\', get_called_class()), 0, 2);
		array_unshift($parts, ROOT);
		array_push($parts, 'views');
		$prefix = implode(DIRECTORY_SEPARATOR, $parts);

		return $prefix;
	}

	public function action404()
	{
		echo 'Page is not found';
	}
}