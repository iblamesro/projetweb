<?php

require_once '../vendor/autoload.php';

use App\Router;

$router = new Router();

$router->addRoute('Accueil', 'AccueilController');
$router->addRoute('Formulaire', 'FormulaireController');
$router->addRoute('post', 'PostController');

$router->matchRoute($_GET['page'], $_GET['action'] ?? null);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

