<?php

namespace undefined\views;

class BackOfficeView {

<<<<<<< HEAD
use undefined\models\Reservation;

class BackOfficeView
{
=======
>>>>>>> ffed3f36c04ed9082a0c62aef52d2100e4b42dcd
    private $autorise;
    private $reservations;

    public function __construct($autorise) {
        $this->autorise = $autorise;
        $this->reservations = Reservation::get();
    }

    public function render() {
        if ($this->autorise) {
            $html = <<<END
            <h1>Back-office</h1>
            <h2>Liste des réservations</h2>
END;
            foreach ($this->reservations as $r){
                $util = $r->user()->first();
                $html .=  <<<END
                <div>
                    <p>Réservation $r->id_res</p>
                    <p>Réservé par $util->nom</p>
                    <a href="confirm/$r->id_res">Confirmer la réservation</a>
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