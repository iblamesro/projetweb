<?php

namespace App\Controller;

use App\Controller\BaseController;

final class PostController extends BaseController
{
    public function list(): array
    {
        return [];
    }

                                        public function create()
                                        {
                                            if ('POST' === $_SERVER['REQUEST_METHOD']){
                                                $data = [
                                                    'id'=> $_POST['id'],
                                                    'identifiant'=> $_POST['identifiant'],
                                                    'password'=> $_POST['password'],
                                                    'email'=> $_POST['email'],
                                                    'commentaire'=> $_POST['commentaire'],
                                                ];
                                            }
                                            echo $this->render('templates/Formulaire.html.twig', $data ?? []);
                                        }

                                        public function read()
                                        {
                                            // TODO To dev;
                                            echo $this->render('Accueil.html.twig', [
                                                'colors' => [
                                                    'red',
                                                    'yellow',
                                                    'green',
                                                ]
                                            ]);
                                        }

    public function update()
    {
        // TODO To dev;
    }

    public function delete()
    {
        // TODO To dev;
    }
}
