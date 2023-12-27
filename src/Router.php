<?php

namespace App;

final class Router
{
                                    private array $routes = [];

                                    public function __construct()
                                    {
                                        $this->addRoute('formulaire', 'FormulaireController');
                                    }

                                    public function addRoute(string $name, string $controller): void
                                    {
                                        $this->routes[$name] = $controller;
                                    }

                                    public function matchRoute(): void
                                    {
                                        $action = $_GET['action'] ?? 'index';
                                        $route = $_GET['page'] ?? null;

                                        if ($route !== null) {
                                            $controllerName = $this->routes[$route] ?? null;

                                            if ($controllerName) {
                                                $controller = new $controllerName();
                                                $controller->$action();
                                            } else {
                                                echo 'Route not found';
                                            }
                                        }
                                    }
}

