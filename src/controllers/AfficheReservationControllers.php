<?php

namespace undefined\controllers;

class AfficheReservationControllers {

    public function __construct() {}

    public function afficheReservationController(){
        /*$head = ;
        $foot = ;*/
        $arv = new AfficheReservationView();
        echo $arv->render();
    }

}