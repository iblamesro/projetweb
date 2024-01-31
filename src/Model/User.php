<?php
namespace App\Model;

use PDO;

class User
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function saveUser($identifiant, $password, $email, $commentaire) // Méthode qui crée un utilisateur
    {
        // Logique de création
        if ($this->isFormValid()) { // Si le formulaire est valide
            $password = md5($password); // On crypte le mot de passe

            $statement = $this->pdo->prepare("SELECT * FROM user WHERE email = :email"); // On prépare la requête
            $statement->bindValue(':email', $email, PDO::PARAM_STR); // On associe :email à $email
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$result) {// Si l'email n'existe pas
                $statement = $this->pdo->prepare("INSERT INTO user VALUES (null,:identifiant,:password,:email,:commentaire)"); // On prépare la requête
                $statement->execute([// On exécute la requête
                    ':identifiant' => $identifiant,
                    ':password' => $password,
                    ':email' => $email,
                    ':commentaire' => $commentaire,
                ]);

                session_start();
                $_SESSION['inscription'] = "ok"; // On crée une variable de session
                header("location: templates/Accueil.html.twig"); // On redirige l'utilisateur
            } else {
                $error = "Cet email est déjà utilisé"; // On crée un message d'erreur
            }
        } else {
            $error = "Tous les champs doivent être remplis"; // On crée un autre message d'erreur
        }
    }

    private function isFormValid() // Méthode qui vérifie si le formulaire est valide
    {
        return !empty($_POST['identifiant']) && !empty($_POST['password']) && !empty($_POST['email']) && 
            !empty($_POST['commentaire']);  // On retourne un booléen
    }
}
