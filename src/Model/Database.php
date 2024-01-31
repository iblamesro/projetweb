<?php

namespace App\Model;



namespace App\Model;

class Database
{
    private static $pdo;

                                public static function getConnection()
                                {
                                    if (!self::$pdo) { // Si la connexion à la base de données n'existe pas encore
                                        // Configurer votre connexion à la base de données ici
                                        $dsn = 'mysql:host=localhost;dbname=projetmiage';  // Data Source Name
                                                    $username = 'root'; // Nom d'utilisateur
                                                    $password = ''; // Mot de passe

                                        try {// On essaie de créer une nouvelle connexion à la base de données
                                            self::$pdo = new \PDO($dsn, $username, $password); // On instancie PDO
                                            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // On active les erreurs PDO
                                        } catch (\PDOException $e) { // On capture les exceptions PDO
                                            die('Erreur de connexion à la base de données : ' . $e->getMessage()); // On affiche un message d'erreur
                                        }
                                    }

                                    return self::$pdo; // On retourne l'instance de PDO
                                }
}
