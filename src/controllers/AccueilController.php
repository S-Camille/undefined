<?php

namespace undefined\controllers;

use undefined\models\Categorie;
use undefined\views\CategorieView;
use undefined\views\GlobaleView;

class AccueilController {
	
	public function __construct() {}

	public function affichageAcc() {
		$app=\Slim\Slim::getInstance();
		$head = GlobaleView::header([]);
		$foot = GlobaleView::footer();
		$c = Categorie::get();
		$cv = new CategorieView($c);
		echo $head.$cv->render().$foot;
	}
	
}