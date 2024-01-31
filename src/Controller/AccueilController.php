<?php

namespace App\Controller;


class AccueilController extends BaseController {

    public function accueil() { // Méthode qui affiche la page d'accueil
        echo $this->render('Accueil.html.twig', []); // Affiche le template Accueil.html.twig
    }
    
    // ... autres méthodes du contrôleur
}

                                        

