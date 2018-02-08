<?php

namespace undefined\controllers;
<<<<<<< HEAD
use undefined\models\Reservation;
=======

>>>>>>> ffed3f36c04ed9082a0c62aef52d2100e4b42dcd
use undefined\views\BackOfficeView;
use undefined\models\User;

class BackOfficeController {

    private $user;
    const RESERVE = 1;
    const ADMIN = 12;

    public function __construct() {
        $user = unserialize($_SESSION['user']);
        $this->user = User::where('id', '=', $user->id)->first();
    }

    public function afficherPage($niveau) {
        if ($this->estAutorise($niveau)) {
            $v = new BackOfficeView(true);
        }
        else {
            $v = new BackOfficeView(false);
        }
        $v->render();
    }

    public function estAutorise($niveau_demande) {
        $niveau = unserialize($_SESSION['user'])->niveau;
        return $niveau >= $niveau_demande;
    }
<<<<<<< HEAD

    public function confirmerReservation($id_res){
        $res = Reservation::where('id_res', '=', $id_res)->first();
        if ($this->estAutorise(BackOfficeController::ADMIN)) {
            $res->etat = BackOfficeController::RESERVE;
            $res->save();
        }
        $v = new BackOfficeView(true);
        $v->render();
    }
=======
    
>>>>>>> ffed3f36c04ed9082a0c62aef52d2100e4b42dcd
}