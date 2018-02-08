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
	<input type="hidden" name="HeureDeb" id="heureDeb" value="8"/>
	<input type="hidden" name="HeureFin" id="heureFin" value="10"/>
	<input type="hidden" name="Id_item" id="id_item" value="{$this->id}">

	<label><br/> Jour de début : </label>
	<select id="jourDeb" name="JourDeb">
        <option value="1" selected>Lundi</option> 
        <option value="2" >Mardi</option>
        <option value="3">Mercredi</option>
        <option value="4">Jeudi</option>
        <option value="5">Vendredi</option>
    </select>

	<label><br/>Heure de début<br/></label>
	<input type="radio" name="Deb" value="8" onClick="heure(8,'heureDeb')" checked/>
	<label>8h</label>
    <input type="radio" name="Deb" value="10" onClick="heure(10,'heureDeb')"/>
    <label>10h</label>
    <input type="radio" name="Deb" value="14" onClick="heure(14,'heureDeb')"/>
    <label>14h</label>
    <input type="radio" name="Deb" value="16" onClick="heure(16,'heureDeb')"/>
    <label>16h</label>
    
    <label><br/> Jour de Fin : </label>
	<select id="JourFin" name="JourFin">
        <option value="1" selected>Lundi</option> 
        <option value="2" >Mardi</option>
        <option value="3">Mercredi</option>
        <option value="4">Jeudi</option>
        <option value="5">Vendredi</option>
    </select>
    
    <label><br/>Heure de Fin<br/></label>
    <input type="radio" name="Fin" value="10" onClick="heure(10,'heureDeb')" checked/>
    <label>10h</label>
    <input type="radio" name="Fin" value="12" onClick="heure(12,'heureFin')"/>
    <label>12h</label>
    <input type="radio" name="Fin" value="16" onClick="heure(16,'heureFin')"/>
    <label>16h</label>
    <input type="radio" name="Fin" value="18" onClick="heure(18,'heureFin')"/>
    <label>18h</label>
	<button type="submit" name="Ajout_item" value="ajout_item">Valider Reservation</button>
</form>

END;
        return GlobaleView::header([]) . $html . GlobaleView::footer();
    }

}