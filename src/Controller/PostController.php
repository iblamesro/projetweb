<?php

namespace App\Controller;

use App\Controller\BaseController;
use Twig\Environment;

final class PostController extends BaseController
{
    public function list(): array
    {
        return [];
    }

    public function create()
    {
        // TODO To dev;

        // Appel à la BDD
    }

    public function read()
    {
        // TODO To dev;
        echo $this->render('index.html.twig', [
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
