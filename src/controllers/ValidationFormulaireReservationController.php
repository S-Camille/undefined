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
            $res->h_debut = $app->request->post('Deb');
            $res->h_fin = $app->request->post('Fin');
            $res->id_item = $res->j_fin = $app->request->post('Id_item');
            $res->j_debut = $app->request->post('JourDeb');
            $res->j_fin = $app->request->post('JourFin');
            $resJ = Reservation::where("j_debut",'>=',$app->request->post('JourDeb'))->where("j_fin",'<=',$app->request->post('JourFin'))->get();
            foreach ($resJ as $blabla){
                $debBla = $blabla->j_debut * 100 + $blabla->h_debut;
                $debRes = $res->j_debut * 100 + $res->h_debut;
                $finBla = $blabla->j_fin * 100 + $blabla->h_fin;
                $finRes = $res->j_fin * 100 + $res->h_fin;
                if(($debBla >= $debRes && $finRes <= $finRes) || ($finRes < $debBla) || ($debRes < $finBla)){
                    $valide = 0;
                }
            }
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
            $app->redirect($app->urlFor("ConnectError"));
        }
    }
    
}