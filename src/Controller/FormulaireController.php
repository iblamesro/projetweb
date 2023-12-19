<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class FormulaireController extends BaseController {

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
            
            echo $this->render('templates/post/Formulaire.html.twig'); 
        }
    }

    public function read()
    {
        
        $data = [];

        echo $this->render('templates/post/Accueil.html.twig', ['data' => $data]); 
    }


    public function update()
    {
        
    }

    public function delete()
    {
       
    }
}
