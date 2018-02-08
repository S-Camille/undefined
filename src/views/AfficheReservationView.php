<?php
namespace undefined\views;

class AfficheReservationView {

    private $res;

    public function __construct($res = null) {
        if ($res == null){
            $this->res = "Non reservé";
        }
        else{
            $this->res = "Reservé par " . $res;
        }
    }

    public function render(){
        $html = <<<END
        <div>
            <label>Reservation : {$this->res}</label>
        </div>
END;
;
        return $html;
    }

}