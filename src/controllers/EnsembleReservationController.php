<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 08/02/2018
 * Time: 21:48
 */

namespace undefined\controllers;


use undefined\models\Reservation;
use undefined\views\EnsembleReservationView;
use undefined\views\GlobaleView;

class EnsembleReservationController
{

    /**
     * EnsembleReservationController constructor.
     */
    public function __construct(){}

    public function affichage(){
        $head = GlobaleView::header([]);
        $foot = GlobaleView::footer();
        $user = unserialize($_SESSION['user']);
        $res = Reservation::where("id_utili", "=", $user->id)->get();
        $erv = new EnsembleReservationView($res);
        echo $head . $erv->render() . $foot;
    }
}