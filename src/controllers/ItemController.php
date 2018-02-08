<?php

namespace undefined\controllers;

use undefined\views\GlobaleView;
use undefined\models\Item;
use undefined\views\ItemView;

class ItemController {

	private $id;

	public function __construct($n) {
		$this->id = $n;
	}

	public function affichageItem() {
		$item = Item::where('id', '=', $this->id)->first();
		$vi = new ItemView($item);
		echo $vi->render();
	}

}