<?php

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
        echo (new RegisterView())->render();
    }

    public function traiterInscriptionForm() {
        $app = \Slim\Slim::getInstance();
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm']) && $_POST['password_confirm'] == $_POST['password']) {
            $user = User::where('nom', '=', $_POST['username'])->first();
            if(isset($user)) {
                $app->redirect($app->urlFor('Register'));
            }
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
        $app = \Slim\Slim::getInstance();
        if (!isset($_SESSION['user'])) {
            $app->redirect($app->urlFor('Accueil'));  
        }

        $upload = $this->upload('avatar',$app->request->getRootUri().'/web/img/user/'.unserialize($_SESSION['user'])->id.'.'.explode('.',$_FILES['avatar']['name'])[1]);
        
        if (isset($_POST['password'])) {
            $user = unserialize($_SESSION['user']);
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
            $app = \Slim\Slim::getInstance();
            $app->redirect($app->urlFor('Profile'));
        }
    }

    public function deconnexion() {
        unset($_SESSION['user']);
        $app = \Slim\Slim::getInstance();  
        $app->redirect($app->urlFor('Accueil'));
    }

    private function upload($index,$destination,$maxsize=FALSE,$extensions=['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF'])
    {
        //Test1: fichier correctement uploadé
        if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
        //Test2: taille limite
        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
        //Test3: extension
        $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
        if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
        //Déplacement
        return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
    }
 
}