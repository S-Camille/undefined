<?php

namespace undefined\models;

class Item extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categorie() {
        return $this->belongsTo('undefined\models\Categorie', 'id_categ');
    }

}