<?php

namespace undefined\models;

class Reservation extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'reservation';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('undefined\models\User', 'id');
    }

}