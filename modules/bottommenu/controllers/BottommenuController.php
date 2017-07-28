<?php

namespace modules\bottommenu\controllers;

use core\Controller;

class BottommenuController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function actionIndex()
	{
		$this->render('index', [], false);
	}
}