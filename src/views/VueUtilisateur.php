<?php

namespace undefined\views;

class VueUtilisateur {

  private $choix;
  private $contenue;

 	public function __construct($ch,$con) {
    switch ($ch) {
      case 1:
        $this->choix = 'listeUsers';
        break;
    }
    $this->contenue = $con;
	}

  public function render(){
    switch ($this->choix) {
      case 'listeUsers':
        $this->afficherListeUtilisateurs();
        break;
    }
  }

  public function afficherListeUtilisateurs(){
    $tab=$this->contenue;
    $app = \Slim\Slim::getInstance();
    foreach ($tab as $key => $value) {
      $img = $app->request()->getRootUri().'/web/img/user/'.$key.'.jpg';
      echo "Nom: ".$value."<img src=$img></img>"."<br/>";
    }
  }

}