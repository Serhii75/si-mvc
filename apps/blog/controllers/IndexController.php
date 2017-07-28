<?php

namespace apps\blog\controllers;

use core\Controller;

class IndexController extends Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function actionIndex()
	{
		$this->render('index/index', []);
	}
}