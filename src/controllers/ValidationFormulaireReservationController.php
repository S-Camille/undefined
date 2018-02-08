<?php

namespace undefined\controllers;

use MongoDB\BSON\Timestamp;
use undefined\models\Reservation;

class ValidationFormulaireReservationController{

    public function __construct(){}

    public function validation(){
        $app = \Slim\Slim::getInstance();
        if (isset($_SESSION["user"])){
            $user = "";
            $res = new Reservation();
            $res->h_debut = $app->request->post('deb');
            $res->h_fin = $app->request->post('fin');
            $res->j_debut = $app->request->post('jourDeb');
            $res->j_fin = $app->request->post('jourDeb');
            $user = unserialize($_SESSION['user']);
            $res->id_utili = $user->id;
            $res->etat = null;
            $res->creation = date("Y-m-d   H:i:s",time());
            $res->modification = date("Y-m-d   H:i:s",time());
            $res->save();
        }
        else{
            $app->redirect("connectError");
        }
    }
}