<?php

require_once '../vendor/autoload.php';

use App\Router;

$router = new Router(); // On instancie le routeur
 
$router->addRoute('Accueil', 'AccueilController'); // On ajoute les routes
$router->addRoute('Formulaire', 'FormulaireController');
$router->addRoute('post', 'PostController');

$router->matchRoute($_GET['page'], $_GET['action'] ?? null); // On match la route

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


