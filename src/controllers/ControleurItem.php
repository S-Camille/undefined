<?php

namespace undefined\controllers;

use undefined\models\Categorie;
use undefined\models\Item;
use undefined\views\VueCategorie;
use undefined\views\GlobaleView;

class ControleurItem {

    public function afficherItemsCategorie($id){
        $items = Item::where('id_categ', '=', $id)->get();
        $categorie = Categorie::where('id', '=', $id)->first();
        $v = new VueCategorie($categorie, $items);
        $head = GlobaleView::header([]);
        $foot = GlobaleView::footer();
        echo $head.$v->render().$foot;
    }

}
