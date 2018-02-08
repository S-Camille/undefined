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
	$acc = new AccueilController();
	$acc->affichageAcc();
})->name('Accueil');

$app->run();