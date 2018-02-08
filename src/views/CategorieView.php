<?php

namespace undefined\views;

class CategorieView {

	private $cat;

 	public function __construct($c) {
 		$this->cat = $c;
	}

 	public function render() {	
 		$html = '<div class="ensembleListes">';
 		$app = \Slim\Slim::getInstance();
 		foreach ($this->cat as $c) {
 			$urlListeItemsCat = $app->urlFor('ListeItemsCat', ['id' => $c->id]);
 			$html = $html.'<a href = "'.$urlListeItemsCat.'" class="liste"><div >';
			$html = $html.'<div class="cat_nom">'.$c->nom."</div><div class=\"cat_desc\">".$c->description."</div>";
			$html = $html.'</div></a>';
 		}
 		$html = $html.'</div>';
		return $html;
	}

	public function render_id() {		
		$html = '<div class="cat_id">';
		$html = $html.$this->cat->id."<br>";
		$html = $html.'</div>';
		return $html;
	}

	public function render_nom() {		
		$html = '<div class="cat_nom">';
		$html = $html.$this->cat->nom."<br>";
		$html = $html.'</div>';
		return $html;
	}

	public function render_desc() {		
		$html = '<div class="cat_desc">';
		$html = $html.$this->cat->description."<br>";
		$html = $html.'</div>';
		return $html;
	}

}