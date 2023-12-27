<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FormulaireController extends BaseController {

    private $twig;

        public function __construct()
        {
            $loader = new FilesystemLoader(__DIR__ . '/../../templates'); // Ajoutez le chemin approprié à votre structure de fichiers
            $this->twig = new Environment($loader, [
                'debug' => true,
                // Autres configurations Twig
            ]);
            $this->twig->addExtension(new DebugExtension());
        }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifiant = $_POST['identifiant'] ?? '';
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
