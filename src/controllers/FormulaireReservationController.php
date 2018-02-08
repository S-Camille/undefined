<?php

namespace undefined\controllers;


use Slim\Slim;
use undefined\views\FormulaireReservationView;

class FormulaireReservationController{

    public function __construct(){}

    public function affichageFormulaire(){
        if (isset($_SESSION["user"])){
            $frv = new FormulaireReservationView();
            echo $frv->render();
        }
        else{
            $app = Slim::getInstance();
            $app->redirect($app->urlFor('connectError'));
        }
    }
}