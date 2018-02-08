<?php

namespace undefined\controllers;

use undefined\views\FormulaireReservationView;

class FormulaireReservationController {

    public function __construct(){}

    public function affichageFormulaire() {
        if (isset($_SESSION["user"])) {
            $frv = new FormulaireReservationView();
            echo $frv->render();
        }
        else {
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('ConnectError'));
        }
    }
    
}