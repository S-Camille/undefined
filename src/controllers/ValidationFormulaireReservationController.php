<?php

namespace undefined\controllers;

use MongoDB\BSON\Timestamp;
use undefined\models\Reservation;

class ValidationFormulaireReservationController{

    public function __construct() {}

    public function validation() {
        $app = \Slim\Slim::getInstance();
        $valide = 1;
        if (isset($_SESSION["user"])){
            $user = "";
            $res = new Reservation();
            $res->h_debut = $app->request->post('deb');
            $res->h_fin = $app->request->post('fin');
            $res->id_item = $res->j_fin = $app->request->post('id_item');
            $resJ = Reservation::where("j_deb",'=',$app->request->post('jourDeb'))->get();
            foreach ($resJ as $blabla){
                if($res->h_debut <= $blabla->h_debut && $blabla->h_fin <= $res->h_fin && $res->id_item == $blabla->id_item){
                    $valide = 0;
                }
            }
            $res->j_debut = $app->request->post('jourDeb');
            $res->j_fin = $app->request->post('jourDeb');
            $user = unserialize($_SESSION['user']);
            $res->id_utili = $user->id;
            $res->etat = null;
            $res->creation = date("Y-m-d   H:i:s",time());
            $res->modification = date("Y-m-d   H:i:s",time());

            if($valide == 1) {
                $res->save();
                $app->redirect($app->urlFor('Accueil'));
            }
            else{
                $app->redirect($app->urlFor('FormRes', ['id' => $res->id_item]));
            }
        }
        else {
            $app->redirect($app->urlFor("connectError"));
        }
    }
    
}