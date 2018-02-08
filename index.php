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
	$acc = new AccueilController();
	$acc->affichageAcc();
})->name('Accueil');

$app->get('/categorie/:id', function($id){
	$c = new ControleurItem();
    $c->afficherItemsCategorie($id);
})->name('ListeItemsCat');

$app->get('/ListeReserv', function(){

})->name('ListeReserv');

$app->get('/PlanningGraph', function(){

})->name('PlanningGraph');

$app->get('/FormRes', function(){

})->name('FormRes');

$app->get('/Item/:id', function($id){
	$ic = new ItemController($id);
	$ic->affichageItem();
})->name('Item');

$app->get('/utilisateurs',function(){
	$cu = new ControleurUtilisateur();
	$cu->afficherListeUtilisateurs();
})->name('Uti');

$app->get('/AffForm',function(){
    $afc = new FormulaireReservationController();
    $afc->affichageFormulaire();
})->name('AffichageFormulaire');

$app->post('/ValRes', function (){
    $vf = new ValidationFormulaireReservationController();
    $vf->validation();
})->name('ValidationFormulaire');

$app->get('/auth/login', function(){
	$cu = new ControllerUser();
	$cu->afficherConnexionForm();
})->name('Connect');

$app->post('/auth/login', function(){
	$cu = new ControllerUser();
	$cu->traiterConnexionForm();
})->name('Connect_valid');

$app->get('/auth/register', function(){
	$cu = new ControllerUser();
	$cu->afficherInscriptionForm();
})->name('Register');

$app->post('/auth/register', function(){
	$cu = new ControllerUser();
	$cu->traiterInscriptionForm();
})->name('Register_valid');

$app->get('/AfficheReservation', function(){
    $arc = new AfficheReservationControllers();
    $arc->afficheReservationController();
})->name('AffRes');

$app->get('/AfficheReservation/:id', function($id){
    $arc = new AfficheReservationControllers();
    $arc->afficheReservationController($id);
})->name('AffResNum');

$app->get('auth/profile', function(){
	// formulaire edition profil
})->name('Profile');

$app->post('auth/profile', function(){
	// formulaire validation edition
})->name('Profile_valid');


$app->get('/auth/logout', function(){
	$cu = new ControllerUser();
	$cu->deconnexion();
})->name('Deco');


$app->get('/admin', function(){
   $c = new \undefined\controllers\BackOfficeController();
   $c->afficherPage(-1);
});

$app->run();