<?php

namespace undefined\controllers;

use undefined\views\FormulaireReservationView;

class FormulaireReservationController {

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function affichageFormulaire(){
        if (isset($_SESSION["user"])){
            $frv = new FormulaireReservationView($this->id);
            echo $frv->render();
        }
        else {
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('ConnectError'));
        }
    }
    
}