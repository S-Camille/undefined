<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:03
 */

namespace undefined\models;
class User extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
