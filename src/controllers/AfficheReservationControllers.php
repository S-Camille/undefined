<?php

namespace undefined\controllers;

use undefined\views\AfficheReservationView;
use undefined\views\GlobaleView;

class AfficheReservationControllers {

    public function __construct() {}

    public function afficheReservationController($res = null){
        $head = GlobaleView::header([]);
        $foot = GlobaleView::footer();
        $arv = new AfficheReservationView($res);
        echo $arv->render($res);
    }
}