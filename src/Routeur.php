<?php

namespace App;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Routeur {
    private array $routes = [];
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new Environment($loader);
    }

    public function addRoute(string $name, string $controller): void
    {
        $this->routes[$name] = $controller;
    }

    public function matchRoute($page)
    {
        switch ($page) {
            case 'Accueil':
                echo $this->twig->render('templates/post/Accueil.html.twig', []);
                break;
            case 'Formulaire':
                require_once 'templates/post/FormulaireController.php';
                $controller = new \App\Controller\FormulaireController($this->twig);
                $controller->afficherPage();
                break;
            default:
                
                break;
        }
    }
}
