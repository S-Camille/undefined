<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:06
 */
namespace undefined\controllers;
use undefined\models\Categorie;
use undefined\models\Item;
use undefined\views\VueCategorie;
class ControleurItem {

    public function afficherItemsCategorie($id){
        $items = Item::where('id_categ', '=', $id)->get();
        $categorie = Categorie::where('id', '=', $id)->first();

        $v = new VueCategorie($categorie, $items);
        $v->render();
    }
}