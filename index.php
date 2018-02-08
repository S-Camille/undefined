<?php
require 'vendor/autoload.php';

use undefined\controllers\AccueilController;

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
    //$c = new \undefined\controller\ControleurItem();
    //$c->afficherItemsCategorie($id);
    echo "toto";
});


$app->run();