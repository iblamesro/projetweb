<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    public function render(string $template, array $variables): string // Méthode qui affiche un template Twig
    {
        $loader = new FilesystemLoader(sprintf('%s/templates/', dirname(__DIR__))); // On indique le chemin vers le dossier des templates
        $twig = new Environment($loader, [ // On instancie Twig
            'debug' => true,// On active le mode debug
            'path' => true, // On active le mode path
        ]);
        $twig->addExtension(new DebugExtension()); // On ajoute l'extension DebugExtension

        return $twig->render($template, $variables); // On retourne le template Twig
    }
}
