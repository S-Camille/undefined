<?php

namespace undefined\controllers;

use undefined\models\Categorie;
use undefined\views\GlobaleView;

class AccueilController {
	
	public function __construct() {}

	public function affichageAcc() {
		$app=\Slim\Slim::getInstance();
		$head = GlobaleView::header([]);
		$foot = GlobaleView::footer();
		echo $head.$foot;
	}
	
}