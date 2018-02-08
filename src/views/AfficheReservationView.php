<?php

namespace undefined\views;

class AfficheReservationView {

    private $res;

    public function __construct($res = null) {
        if ($res == null) {
            $this->res = "Non réservé";
        }
        else {
            $this->res = "Réservé par " . $res;
        }
    }

    public function render() {
        $html = <<<END
        <div>
            <label>Réservation : {$this->res}</label>
        </div>
END;
        return $html;
    }

}