<?php

namespace apps\admin\controllers;

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

	public function actionTest()
	{
		echo 'Admin test action';
	}
}