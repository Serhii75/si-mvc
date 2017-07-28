<?php

namespace core;

class View
{
	public function render($prefix, $view, $data = [], $layout = false)
	{
		
		$subview = $prefix . DIRECTORY_SEPARATOR . $view . '.php';
		if ( !file_exists($subview) ) {
			throw new \Exception("View {$view} is not exists");
		}

		extract($data);
		ob_start();
		require_once $subview;
		$content = ob_get_clean();
		
		if ( !$layout ) {
			echo $content;
			return;
		}

		$layout = $prefix . DIRECTORY_SEPARATOR . $layout . '.php';
		if ( !file_exists($layout) ) {
			throw new \Expeption("Layout {$layout} is not exists.");
		}

		ob_start();
		require_once $layout;
		echo ob_get_clean();

		/*echo $view . '<br>';
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		var_dump($layout);*/
	}
}