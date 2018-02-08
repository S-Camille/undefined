<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 14:35
 */

namespace undefined\controllers;
use undefined\views\BackOfficeView;
use undefined\models\User;
class BackOfficeController {

    private $user;

    public function __construct()
    {
        $user = unserialize($_SESSION['user']);
        $this->user = User::where('id', '=', $user->id)->first();
    }

    public function afficherPage($niveau){
        if ($this->estAutorise($niveau)){
            $v = new BackOfficeView(true);
        }
        else {
            $v = new BackOfficeView(false);
        }
        $v->render();
    }

    public function estAutorise($niveau_demande){
        $niveau = unserialize($_SESSION['user'])->niveau;
        return $niveau >= $niveau_demande;
    }
}