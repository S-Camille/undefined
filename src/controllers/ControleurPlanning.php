<?php

namespace undefined\controllers;

use undefined\models\Categorie;
use undefined\models\Item;
use undefined\views\VueCategorie;
use undefined\views\GlobaleView;
use undefined\models\Reservation;

class ControleurPlanning{

  function afficherPlanning($id){
    initialiserPlanning();
      $reservations=Reservation::where()
  }

  $reserve;

  $heures=["8H","9H","10H","11H","12H","13H","14H","15H","16H","17H","18H"];

  $jours=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];

  function initialiserPlanning(){
    global $reserve;
    for ($i=0; $i < 7; $i++) {
      $t=[];
      for ($j=0; $j < 11; $j++) {
        $t[]="Vacant";
      }
      $reserve[]=$t;
    }
  }

  function reserverHoraire($j,$h){
    global $reserve;
    $reserve[$j][$h]="Reserve";
  }


  function affichagePlanning(){
    global $heures;
    global $jours;
    global $reserve;
    $res='<table><tr><td>Horaires</td>';
    foreach ($jours as $k => $v) {
      $res.="<td>".$v."</td>";
    }
    $res.="</tr>";

    $res.="<tr>";
    foreach ($heures as $k => $v) {
    $res.="<td>".$heures[$k]."</td>";
      foreach ($jours as $key => $value) {
      $res.="<td>".$reserve[$key][$k]."</td>";
    }
    $res.="</tr>";
  }

    return $res."</table>";
  }



}


 ?>
