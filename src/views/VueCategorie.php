<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:13
 */
namespace undefined\views;
class VueCategorie {

    private $categorie;
    private $items;

    public function __construct($categorie, $items)
    {
        $this->categorie = $categorie;
        $this->items = $items;
    }

    public function render(){
        $nom = $this->categorie->nom;
        $html = <<<END
        <h2>Liste des items de la catégorie $nom</h2> 
END;
        foreach ($this->items as $i){
            $nom_item = $i->nom;
            $description = $i->description;

            $html .= <<<END
            <h3>$nom_item</h3>
            <div>$description</div>
END;
        }

        echo $html;

    }
}