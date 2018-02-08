<?php

namespace undefined\views;


class VuePlanning {

	private $cont;

 	public function __construct($c) {
 		$this->cont = $c;
	}

  public function render(){
    echo $this->cont;
  }

}





 ?>
