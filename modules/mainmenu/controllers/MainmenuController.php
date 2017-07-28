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
		echo 'I am the mainmenu module';
	}
}