<?php

namespace undefined\views;

use undefined\models\Item;
use undefined\models\Categorie;
use undefined\views\GlobaleView;

class ItemView {

	private $item;

 	public function __construct(Item $it) {
 		$this->item = $it;
	}

	public function render_id() {
		$html = '<div class="item_id">';
		$html = $html.$this->item->id." : ";
		$html = $html.'</div>';
		return $html;
	}

	public function render_nom() {
		$html = '<div class="item_titre">';
		$html = $html.$this->item->nom."<br />";
		$html = $html.'</div>';
		return $html;
	}

	public function render_desc() {
		$html = '<div class="item_desc">';
		$html = $html.$this->item->description." : ";
		$html = $html.'</div>';
		return $html;
	}

	public function render() {
		$id = $this->item->id;
		$nom = $this->item->nom;
		$desc = $this->item->description;
		$app = \Slim\Slim::getInstance();
		$img = $app->request()->getRootUri().'/web/img/item/'.$id.'.jpg';
		$it = GlobaleView::header(['css1' => 'formulaire.css', 'css2' => 'item.css']);
        $it = $it . <<<END
        <div id="affItem">
        <div>
            <div id="affimg">
		    	<img src="$img" alt="$nom" height = "150" width = "150"/>
            </div>
            <div id="detailsitem">
			    <table>
				    <tbody>
					    <tr>
						    <td>Id de l'item</td>
                            <td>$id</td>
                        </tr>
                        <tr>
    						<td>Nom de l'item</td>
                            <td>$nom</td>
                        </tr>
                        <tr>
						    <td>Description de l'item</td>
                            <td>$desc</td>
                        </tr>
                    </tbody>
                </table>
            </div></div>
END;
		$url = $app->urlFor('ListeReserv');
        $url2 = $app->urlFor('PlanningGraph',['id'=>$this->item->id]);
        $url3 = $app->urlFor('FormRes');
		$it = $it.<<<END
		<div id="linkBox"><a href="$url" title="Afficher la liste des réservations de cet item"><div class="lienPub" id="esc">Afficher la liste des réservations de cet item</div></a>
		<a href="$url2" title="Afficher son planning graphique"><div class="lienPub">Afficher son planning graphique</div></a>
		<a href="$url3" title="Afficher le formulaire de réservation"><div class="lienPub">Afficher le formulaire de réservation</div></a></div></div>
END;
		$it = $it.GlobaleView::footer();
		return $it;
	}

}
