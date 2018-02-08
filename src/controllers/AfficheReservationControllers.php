<?php

namespace undefined\controllers;

use undefined\views\AfficheReservationView;
use undefined\views\GlobaleView;

class AfficheReservationControllers {

    public function __construct() {}

    public function afficheReservationController(){
        $head = GlobaleView::header();
        $foot = GlobaleView::footer();
        $arv = new AfficheReservationView($res = null);
        echo $head . $arv->render($res) . $foot;
    }

}