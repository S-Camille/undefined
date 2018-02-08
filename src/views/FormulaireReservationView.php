<?php

namespace undefined\views;

use undefined\views\GlobaleView;

class FormulaireReservationView{

    private $id;

    public function __construct($id){
        $this->id = $id;
    }

    public function render(){
        $app = \Slim\Slim::getInstance();
        $url = $app->urlFor('ValidationFormulaire');
        $html = <<<END
        <script> function heure(nb, element) { val deb = document.getElementById(element); deb.value = nb;}</script>
<form method="POST" action="$url" id="ajoutItem" enctype="multipart/form-data">
	<label>Formulaire Res</label>
	<input type="hidden" name="heureDeb" id="heureDeb" value="8"/>
	<input type="hidden" name="heureFin" id="heureFin" value="10"/>
	<input type="hidden" name="id_item" id="id_item" value="{$this->id}">
	<select id="jourDeb" name="jourDeb">
        <option value="1" selected>Lundi</option> 
        <option value="2" >Mardi</option>
        <option value="3">Mercredi</option>
        <option value="4">Jeudi</option>
        <option value="5">Vendredi</option>
    </select>

	<label><br/>Heure de début<br/></label>
	<input type="radio" name="deb" value="8" onClick="heure(8,'heureDeb')" checked/>
	<label>8h</label>
    <input type="radio" name="deb" value="10" onClick="heure(10,'heureDeb')"/>
    <label>10h</label>
    <input type="radio" name="deb" value="14" onClick="heure(14,'heureDeb')"/>
    <label>14h</label>
    <input type="radio" name="deb" value="16" onClick="heure(16,'heureDeb')"/>
    <label>16h</label>
    <label><br/>Heure de Fin<br/></label>
    <input type="radio" name="fin" value="8" onClick="heure(10,'heureDeb')" checked/>
    <label>10h</label>
    <input type="radio" name="fin" value="10" onClick="heure(12,'heureFin')"/>
    <label>12h</label>
    <input type="radio" name="fin" value="16" onClick="heure(16,'heureFin')"/>
    <label>16h</label>
    <input type="radio" name="fin" value="18" onClick="heure(18,'heureFin')"/>
    <label>18h</label>
	<button type="submit" name="ajoute_item" value="ajout_item">Valider Reservation</button>
</form>

END;
        return GlobaleView::header([]) . $html . GlobaleView::footer();
    }

}