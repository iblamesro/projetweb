<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FormulaireController extends BaseController {

    private $twig;

        public function __construct() // Constructeur
        {
            $loader = new FilesystemLoader(__DIR__ . '/../../templates'); // Ajoutez le chemin approprié à votre structure de fichiers
            $this->twig = new Environment($loader, [ // On instancie Twig
                'debug' => true, // On active le mode debug
                // Autres configurations Twig
            ]);
            $this->twig->addExtension(new DebugExtension()); // On ajoute l'extension DebugExtension
        }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si le formulaire est envoyé en POST
            $identifiant = $_POST['identifiant'] ?? ''; // On récupère les données du formulaire
            $password = $_POST['password'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';
            $problems = $_POST['problems'] ?? [];

            $this->read();
        } else {
            echo $this->twig->render('Formulaire.html.twig'); // Assurez-vous que le chemin est correct
        }
    }

    public function read()
    {
        $data = [];
        echo $this->twig->render('templates/Formulaire.html.twig', ['data' => $data]); // Assurez-vous que le chemin est correct
    }

                                            public function update()
                                            {
                                                // Logique de mise à jour
                                            }

                                            public function delete()
                                            {
                                                // Logique de suppression
                                            }

                                            public function afficherPage()
                                            {
                                                // Logique de suppression
                                            }

}
