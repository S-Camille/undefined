<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:06
 */
namespace undefined\controller;
use undefined\models\Categorie;
use undefined\models\Item;
use undefined\views\VueCategorie;
class ControleurItem {

    public function afficherItemsCategorie($id){
        $items = Item::get();
        $categorie = Categorie::where('id', '=', $id)->first();
        $res = array();
        foreach ($items as $i){
            if ($i->id_categ === $id)
                $res[] = $i;
        }

        $v = new VueCategorie($categorie, $res);
        $v->render();
    }
}