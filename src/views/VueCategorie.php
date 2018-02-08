<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:13
 */
namespace undefined\views;

use undefined\models\Categorie;
use undefined\models\Item;

class VueCategorie {

    private $categorie;
    private $items;

    public function __construct($categorie, $items) {
        $this->categorie = $categorie;
        $this->items = $items;
    }

    public function render() {
        $nom = $this->categorie->nom;
        $app = \Slim\Slim::getInstance();
        $rootUI = $app->request->getRootUri();
        $rootUI = str_replace('index.php','',$rootUI);
        $html = <<<END
        <h2>Liste des items de la catégorie $nom</h2> 
        <div id="affListeItem">
END;
        foreach ($this->items as $i){
            $nom_item = $i->nom;
            $html .= <<<END
            <div class="item"><a href="{$app->urlFor('Item', ['id' => $i->id])}">
            <h3>$nom_item</h3>
            <img src="$rootUI/web/img/item/{$i->id}.jpg" style="width:100%" alt="$nom_item" />
            </a>
            </div>
END;
        }
        echo "</div>";

        return $html;

    }
}