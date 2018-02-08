<?php
require 'vendor/autoload.php';

use undefined\controllers\AccueilController;
use undefined\controllers\ItemController;
use undefined\controllers\ControleurItem;
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

$app->run();