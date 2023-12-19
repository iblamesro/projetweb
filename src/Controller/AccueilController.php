<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class AccueilController extends BaseController {
    public function accueil() {
        echo $this->render('templates/post/accueil.html.twig',);
    }
    public function create()
    {        
    }

    public function read()
    {
        
        echo $this->render('accueil.html.twig',
        );
    }

    public function update()
    {
        
    }

    public function delete()
    {

    }
}