<?php

namespace App\Model;



namespace App\Model;

class Database
{
    private static $pdo;

                                public static function getConnection()
                                {
                                    if (!self::$pdo) {
                                        // Configurer votre connexion à la base de données ici
                                        $dsn = 'mysql:host=localhost;dbname=projetmiage';
                                                    $username = 'root';
                                                    $password = '';

                                        try {
                                            self::$pdo = new \PDO($dsn, $username, $password);
                                            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                                        } catch (\PDOException $e) {
                                            die('Erreur de connexion à la base de données : ' . $e->getMessage());
                                        }
                                    }

                                    return self::$pdo;
                                }
}
