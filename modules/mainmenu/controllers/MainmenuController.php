<?php

namespace modules\mainmenu\controllers;

use core\Controller;

class MainmenuController extends Controller 
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