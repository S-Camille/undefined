<?php

namespace undefined\controllers;


use undefined\views\FormulaireReservationView;

class FormulaireReservationController{

    public function __construct(){}

    /**
     *
     */
    public function affichageFormulaire(){
        $frv = new FormulaireReservationView();
        echo $frv->render();
    }
}