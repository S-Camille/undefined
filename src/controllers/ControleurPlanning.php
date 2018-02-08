<?php

namespace undefined\controllers;

use undefined\models\Item;
use undefined\views\VuePlanning;
use undefined\views\VueCategorie;
use undefined\views\GlobaleView;
use undefined\models\Reservation;

class ControleurPlanning {

  private $reserve;
 
  private $heures = ["8H", "10H", "12H", "14H", "16H", "18H"];

  private $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];

  function afficherPlanning($id) {
      $tab = $this->initialiserPlanning();
      $reservations = Reservation::where('id_item','=',$id)->get();
      foreach ($reservations as $key => $value) {
        if ($value->j_debut<$value->j_fin) {
          for ($j=0; $j < $value->j_fin-1 ; $j++) {
            for ($i=0; $i < 11; $i++) {
              $tab = $this->reserverHoraire($j,$i,$tab);
            }
          }
        }
        for ($l=0; $l < $value->h_fin-8; $l++) {
          $tab = $this->reserverHoraire($value->j_fin-1,$l,$tab);
        }
      }
      $vP = new VuePlanning($this->affichagePlanning($tab));
      echo GlobaleView::header([]).$vP->render().GlobaleView::footer();

  }
  
  function afficherPlanningUtilisateur($id){
    $tab=$this->initialiserPlanning();
    $reservations=Reservation::where('id_utili',"=",$id)->get();
    foreach ($reservations as $key => $value) {
      if($value->j_debut<$value->j_fin){
        for ($j=0; $j < $value->j_fin-1 ; $j++) {
          for ($i=0; $i < 11; $i++) {
            $tab=$this->reserverHoraire($j,$i,$tab);
          }
        }
      }
      for ($l=0; $l < $value->h_fin-8; $l++) {
        $tab=$this->reserverHoraire($value->j_fin-1,$l,$tab);
      }
    }
    $vP=new VuePlanning($this->affichagePlanning($tab));
    $vP->render();

  }

  function initialiserPlanning() {
    $reserve = array();

    for ($i=0; $i < 7; $i++) {
      $t = [];
      for ($j=0; $j < 11; $j++) {
        $t[] = "Vacant";
      }
      $reserve[] = $t;
    }
    return $reserve;
  }

  function reserverHoraire($j,$h,$tab) {
    $reserve = $tab;
    $reserve[$j][$h] = "Reserve";
    return $reserve;

  }

  function affichagePlanning($tab) {
    $heures = $this->heures;
    $jours = $this->jours;
    $reserve = $tab;
    $res = '<table id="resa"><tr><th></th>';
    foreach ($jours as $k => $v) {
      $res .= "<th class=\"day\">".$v."</th>";
    }
    $res .= "</tr>";
    $res .= "<tr>";
    foreach ($heures as $k => $v) {
      $res .= "<th class=\"hour\">".$heures[$k]."</th>";
      foreach ($jours as $key => $value) {
        $res .= "<td class=\"".(($reserve[$key][$k] == 'Vacant') ? 'dispo' : 'indispo')."\">".$reserve[$key][$k]."</td>";
      }
    $res .= "</tr>";
    }
    return $res."</table>";
  }

}