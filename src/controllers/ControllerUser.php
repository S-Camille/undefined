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
use undefined\views\ProfileView;
use undefined\models\User;

class ControllerUser {

    public function afficherConnexionForm($msgErr = null) {
         echo (new ConnexionView())->render($msgErr);
    }

    public function traiterConnexionForm() {
        $app = \Slim\Slim::getInstance();
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $user = User::where('nom','=',$_POST['username'])->first();
            if(password_verify($_POST['password'], $user->password)) {
                $_SESSION['user'] = serialize($user);
                $app->redirect($app->urlFor('Accueil'));  
            }
        }        
        $app->redirect($app->urlFor('Connect'));
    }

    public function afficherInscriptionForm($msgErr = null) {
        if ($msgErr != null) {
            echo (new RegisterView())->render();
        }
        else {
            echo (new RegisterView())->render($msgErr);
        }
    }

    public function traiterInscriptionForm() {
        $app = \Slim\Slim::getInstance();
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = new User();
            $user->nom = htmlspecialchars($_POST['username']);
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            $app->redirect($app->urlFor('Connect'));
        }
        else {
            $app->redirect($app->urlFor('Register'));
        }
    }

    public function afficherProfil() {
        if (isset($_SESSION['user'])) {
            echo (new ProfileView())->render();  
        }
        else {
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('Accueil'));
        }     
    }

    public function editerProfil() {
        if (!isset($_SESSION['user'])) {
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('Accueil'));  
        }
        if (isset($_POST['password'])) {
            $user = unserialize($_SESSION['user']);
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('profile'));
        }
    }

    public function deconnexion() {
        unset($_SESSION['user']);
        $app = \Slim\Slim::getInstance();  
        $app->redirect($app->urlFor('Accueil'));
    }
}