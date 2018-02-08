<?php

namespace undefined\controllers;

use MongoDB\BSON\Timestamp;
use undefined\models\Reservation;

class ValidationFormulaireReservationController{

    public function __construct(){}

    public function validation(){
        $res = new Reservation();
        $app = \Slim\Slim::getInstance();
        echo "blabla : " .$app->request->post('deb');
        $res->h_debut = $app->request->post('deb');
        $res->h_fin = $app->request->post('fin');
        $res->j_debut = $app->request->post('jourDeb');
        $res->j_fin = $app->request->post('jourDeb');
        if (isset($_SESSION["user_connected"])){
            $res->id_utili = $_SESSION["user_connected"]["id_utili"];
        }
        else{
            $res->id_utili = -1;
        }
        $res->etat = null;
        $res->creation = date("Y-m-d   H:i:s",time());
        $res->modification = date("Y-m-d   H:i:s",time());
        $res->id_utili = 1;
        $res->save();
    }
}