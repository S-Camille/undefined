<?php

namespace undefined\views;

use undefined\models\Item;

class AffDetResView {

	private $res;

	public function __construct() {}

	public function render() {
		$deb = $this->res->debut;
		$fin = $this->res->fin;
		$uti = $this->res->;
		$et = $this->res->etat;
		$cr = $this->res->creation;
		$mo = $this->res->modification;
		$it = GlobaleView::header(['css1' => 'res.css']);
        $it = $it . <<<END
        <div id="affDetRes">
        <div>
            <div id="detailsRes">
			    <table>
				    <tbody>
					    <tr>
						    <td>Début de la réservation</td>
                            <td>$deb</td>
                        </tr>
                        <tr>
    						<td>Fin de la réservation</td>
                            <td>$fin</td>
                        </tr>
                        <tr>
						    <td>Nom de l'utilisateur</td>
                            <td>$uti</td>
                        </tr>
                        <tr>
						    <td>État de la réservation</td>
                            <td>$et</td>
                        </tr>
                        <tr>
    						<td>Date de création</td>
                            <td>$cr</td>
                        </tr>
                        <tr>
						    <td>Date de modification</td>
                            <td>$mo</td>
                        </tr>
                    </tbody>
                </table>
            </div></div>
END;
		$it = $it.GlobaleView::footer();
		return $it;
	}

}