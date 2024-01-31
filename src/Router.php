<?php

namespace App;

final class Router
{
                                    private array $routes = []; // On déclare un tableau vide

                                    public function __construct() 
                                    {
                                        $this->addRoute('formulaire', 'FormulaireController'); // On ajoute les routes
                                    }

                                    public function addRoute(string $name, string $controller): void 
                                    {
                                        $this->routes[$name] = $controller; // On ajoute la route au tableau
                                    }

                                    public function matchRoute(): void // Méthode qui match la route
                                    {
                                        $action = $_GET['action'] ?? 'index'; // On récupère l'action
                                        $route = $_GET['page'] ?? null; // On récupère la route

                                        if ($route !== null) { // Si la route n'est pas nulle
                                            $controllerName = $this->routes[$route] ?? null; // On récupère le nom du contrôleur

                                            if ($controllerName) { // Si le contrôleur existe
                                                $controller = new $controllerName(); // On instancie le contrôleur
                                                $controller->$action(); // On appelle la méthode
                                            } else {
                                                echo 'Route not found'; // On affiche une erreur
                                            }
                                        }
                                    }
}

