<?php
require 'vendor/autoload.php';

use undefined\controllers\AccueilController;
use undefined\controllers\FormulaireReservationController;
use undefined\controllers\ItemController;
use undefined\controllers\ControleurItem;
use undefined\controllers\ControleurUtilisateur;
use undefined\controllers\AfficheReservationControllers;
use undefined\controllers\ControllerUser;
use undefined\controllers\ValidationFormulaireReservationController;
session_start();

$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();


$app = new Slim\Slim();

$app->get('/', function(){
	echo "Hello world";
	$acc = new AccueilController();
	$acc->affichageAcc();
})->name('Accueil');


$app->get('/categorie/:id', function($id){
    $c = new ControleurItem();
    $c->afficherItemsCategorie($id);
});

$app->get('/ListeItemsCat', function(){

})->name('ListeItemsCat');

$app->get('/ListeReserv', function(){

})->name('ListeReserv');

$app->get('/PlanningGraph', function(){

})->name('PlanningGraph');

$app->get('/FormRes', function(){

})->name('FormRes');

$app->get('/Item', function() {
	$ic = new ItemController($_GET["id"]);
	$ic->affichageItem();
})->name('Item');

$app->get('/utilisateurs',function(){
	$cu=new ControleurUtilisateur();
	$cu->afficherListeUtilisateurs();
});
$app->get('/AffForm',function(){
    $afc = new FormulaireReservationController();
    $afc->affichageFormulaire();
})->name('AffichageFormulaire');

$app->post('/ValRes', function (){
    $vf = new ValidationFormulaireReservationController();
    $vf->validation();
})->name('ValidationFormulaire');


// CONNEXION
$app->get('/auth/login', function(){
	(new ControllerUser())->afficherConnexionForm();
})->name('connect');

$app->post('/auth/login', function(){
	(new ControllerUser())->traiterConnexionForm();
})->name('connect_valid');

$app->get('/auth/register', function(){
	(new ControllerUser())->afficherInscriptionForm();
})->name('register');

$app->post('/auth/register', function(){
	(new ControllerUser())->traiterInscriptionForm();
})->name('register_valid');

$app->get('/AfficheReservation', function(){
    $arc = new AfficheReservationControllers();
    $arc->afficheReservationController();
})->name('AffRes');

$app->get('/AfficheReservation/:id', function($id){
    $arc = new AfficheReservationControllers();
    $arc->afficheReservationController($id);
})->name('AffResNum');

$app->get('/auth/profile', function(){
	(new ControllerUser())->afficherProfil();
})->name('profile');

$app->post('/auth/profile', function(){
	(new ControllerUser())->editerProfil();
})->name('profile_valid');


$app->get('/auth/logout', function(){
		(new ControllerUser())->deconnexion();
});
$app->run();
