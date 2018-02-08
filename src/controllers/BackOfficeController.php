<?php

namespace undefined\controllers;
use undefined\models\Reservation;
use undefined\views\BackOfficeView;
use undefined\models\User;
use undefined\views\GlobaleView;

class BackOfficeController {

    private $user;
    const RESERVE = 1;
    const ADMIN = 12;
    const ANNULEE = 0;

    public function __construct() {
        $user = unserialize($_SESSION['user']);
        $this->user = User::where('id', '=', $user->id)->first();
    }

    public function afficherPage($niveau) {
        if ($this->estAutorise($niveau)) {
            $head = GlobaleView::header([]);
            $foot = GlobaleView::footer();
            $v = new BackOfficeView(true);
            echo $head . $v->render() . $foot;
        }
        else {
            $v = new BackOfficeView(false);
            echo $v->render();
        }
        $v->render();
    }

    public function estAutorise($niveau_demande) {
        $niveau = unserialize($_SESSION['user'])->niveau;
        return $niveau >= $niveau_demande;
    }

    public function confirmerReservation($id_res){
        $app = \Slim\Slim::getInstance();
        $res = Reservation::where('id_res', '=', $id_res)->first();
        if ($this->estAutorise(BackOfficeController::ADMIN)) {
            $res->etat = BackOfficeController::RESERVE;
            $res->save();
        }
        $app->redirect($app->urlFor('AffichagePasgeAdmin'));
    }

    public function annulerReservation($id_res){
        $app = \Slim\Slim::getInstance();
        $res = Reservation::where('id_res', '=', $id_res)->first();
        if ($this->estAutorise(BackOfficeController::ADMIN)) {
            $res->etat = BackOfficeController::ANNULEE;
            $res->save();
        }
        $app->redirect($app->urlFor('AffichagePasgeAdmin'));
    }

}