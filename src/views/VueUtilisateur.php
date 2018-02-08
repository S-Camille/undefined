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
    $html = '<form style="display: flex;flex-wrap: wrap;">';
    $it = GlobaleView::header(['css1' => 'formu.css', 'css2' => 'item.css']);
    foreach ($tab as $key => $value) {
      $url=$app->urlFor("PlanningGraphUser",['id'=>$key]);
      $img = $app->request()->getRootUri().'/web/img/user/'.$key.'.jpg';
      $html = $html.'<a href = "'.$url.'" class="liste"><div >';
      $html = $html.'<div class="cat_nom">'.$value."</div><div class=\"cat_img\"><img src=".$img."></img><p style=\"font-size: 12px;\">Accéder au planning</p></div>";
      $html = $html.'</div></a>';
    }
    echo $it.$html.'</div>'.GlobaleView::footer();
  }

}
