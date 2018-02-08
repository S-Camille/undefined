<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 11:06
 */
namespace undefined\controllers;

use undefined\views\RegisterView;
use undefined\views\ConnexionView;
use undefined\models\User;

class ControllerUser {

    public function afficherConnexionForm(){
         echo (new ConnexionView())->render();       
    }

    public function traiterConnexionForm(){
        $app = \Slim\Slim::getInstance();
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = User::where('nom','=',$_POST['username'])->first();
            if(password_verify($_POST['password'], $user->password))
            {
                $_SESSION['user'] = serialize($user);
                $app->redirect($app->urlFor('Accueil'));  
            }
        }        
        $app->redirect($app->urlFor('connect'));
    }

    public function afficherInscriptionForm(){
        echo (new RegisterView())->render();
    }

    public function traiterInscriptionForm(){
        $app = \Slim\Slim::getInstance();
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user = new User();
            $user->nom = htmlspecialchars($_POST['username']);
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            $app->redirect($app->urlFor('connect'));
        } else {
            $app->redirect($app->urlFor('register'));
        }
    }

    public function afficherProfil(){

    }

    public function editerProfil(){

    }

    public function deconnexion(){
        unset($_SESSION['user']);
        $app = \Slim\Slim::getInstance();  
        $app->redirect($app->urlFor('Accueil'));
    }
}