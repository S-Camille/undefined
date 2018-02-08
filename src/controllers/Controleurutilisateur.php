<?php
namespace undefined\controllers;
use undefined\models\User;
use undefined\views\VueUtilisateur;
class ControleurUtilisateur {

public function afficherListeUtilisateurs(){
  $users=User::Select('id','nom')->get();
  $res=array();
  foreach ($users as $v) {
    $res[$v->id]=$v->nom;
  }
  $vu=new VueUtilisateur(1,$res);
  $vu->render();

}


}
