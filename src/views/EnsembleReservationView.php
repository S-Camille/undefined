<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 08/02/2018
 * Time: 21:54
 */

namespace undefined\views;


use undefined\models\Item;
use undefined\models\Reservation;

class EnsembleReservationView
{

    private $ensRes;

    public function __construct($res){
        $this->ensRes = $res;
    }

    public function render(){
        $app = \Slim\Slim::getInstance();
        $html = "<p> Vos Reservations : <br></p>";
        foreach($this->ensRes as $element){
            $url = $app->urlFor('AnnuleeReservationInd', ['id' => $element->id_res]);
            $nom = Item::where('id','=',$element->id_item)->first()->nom;
            $html = $html . '<div class="affItem">' . $nom . " : " . $element->j_debut . " " . $element->h_debut . " " . $element-> j_fin . " " . $element->h_fin . " " . $element->etat;
                if ($element-> etat != 2) {
                    $html = $html . '<a href="' . $url . '">Annuler</a></div>';
                }
                else{
                    $html = $html . "<label>   :        Déjà annulée </label></div>";
                }
        }
        return $html;
    }
}