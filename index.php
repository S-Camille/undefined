<?php

require 'vendor/autoload.php';

use undefined\controllers\AccueilController;
use undefined\controllers\BackOfficeController;
use undefined\controllers\FormulaireReservationController;
use undefined\controllers\ItemController;
use undefined\controllers\ControleurItem;
use undefined\controllers\ControleurPlanning;
use undefined\controllers\ControleurUtilisateur;
use undefined\controllers\AfficheReservationControllers;
use undefined\controllers\ControllerUser;
use undefined\controllers\ValidationFormulaireReservationController;
use undefined\controllers\AffDetResController;

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

$app->get('/PlanningGraph/:id', function($id){
	$c=new ControleurPlanning();
	$c->afficherPlanning($id);
})->name('PlanningGraph');

$app->get('/PlanningGraphUser/:id', function($id){
	$c=new ControleurPlanning();
	$c->afficherPlanningUtilisateur($id);
})->name('PlanningGraphUser');

$app->get('/FormRes/:id', function($id){
	$afc = new FormulaireReservationController($id);
    $afc->affichageFormulaire();
})->name('FormRes');

$app->get('/Item/:id', function($id){
	$ic = new ItemController($id);
	$ic->affichageItem();
})->name('Item');

$app->get('/utilisateurs',function(){
	$cu = new ControleurUtilisateur();
	$cu->afficherListeUtilisateurs();
})->name('Uti');

$app->get('/AffForm/:id',function($id){
    $afc = new FormulaireReservationController($id);
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

$app->get('/auth/loginErr', function(){
    (new ControllerUser())->afficherConnexionForm("Veuillez vous connecter pour continuer");
})->name('ConnectError');

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

$app->get('/auth/profile', function(){
	$cu = new ControllerUser();
	$cu->afficherProfil();
})->name('Profile');

$app->post('/auth/profile', function(){
	$cu = new ControllerUser();
	$cu->editerProfil();
})->name('Profile_valid');

$app->get('/auth/logout', function(){
	$cu = new ControllerUser();
	$cu->deconnexion();
})->name('Deco');

$app->get('/admin', function(){
   $c = new \undefined\controllers\BackOfficeController();
   $c->afficherPage(0);
})->name('AffichagePasgeAdmin');

$app->get('/confirm/:id', function($id){
    $c = new \undefined\controllers\BackOfficeController();
    $c->confirmerReservation($id);
   $c->afficherPage(-1);
})->name('Admin');

$app->get('/changementStatus/:id', function($id){
    $c = new BackOfficeController();
    $c->confirmerReservation($id);
})->name('ConfirmationReservation');

$app->get('/annulerRes/:id', function($id){
    $c = new BackOfficeController();
    $c->annulerReservation($id);
})->name('AnnuleeReservation');

$app->run();
