<?php

namespace undefined\controllers;

use undefined\models\Categorie;
use undefined\views\GlobaleView;

class AfficheCatController {
	
	public function __construct() {}

	public function affichageCat() {
		$app=\Slim\Slim::getInstance();
		$head = GlobaleView::header([]);
		$foot = GlobaleView::footer();
	}
	
}