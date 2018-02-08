<?php

namespace undefined\views;

use undefined\models\Reservation;

class BackOfficeView
{
    private $autorise;
    private $reservations;

    public function __construct($autorise) {
        $this->autorise = $autorise;
        $this->reservations = Reservation::get();
    }

    public function render() {
        $app = \Slim\Slim::getInstance();
        if ($this->autorise) {
            $html = <<<END
            <h1>Back-office</h1>
            <h2>Liste des réservations</h2>
END;
            foreach ($this->reservations as $r){
                $util = $r->user()->first();
                $url = $app->urlFor('ConfirmationReservation',['id' => $r->id_res]);
                $html .=  <<<END
                <div>
                    <p>Réservation {$r->id_res}, par {$util->nom}</p>
                    <a href="$url">Confirmer la réservation</a>
                </div>
END;
                }
            }
        else {
            $html = <<<END
            <h1>Accès interdit</h1>
            <p>Page réservée aux administrateurs</p>
END;
        }
        return $html;
    }

}