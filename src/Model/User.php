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

    public function saveUser($identifiant, $password, $email, $commentaire)
    {
        // Logique de création
        if ($this->isFormValid()) {
            $password = md5($password);

            $statement = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                $statement = $this->pdo->prepare("INSERT INTO user VALUES (null,:identifiant,:password,:email,:commentaire)");
                $statement->execute([
                    ':identifiant' => $identifiant,
                    ':password' => $password,
                    ':email' => $email,
                    ':commentaire' => $commentaire,
                ]);

                session_start();
                $_SESSION['inscription'] = "ok";
                header("location: templates/Accueil.html.twig");
            } else {
                $error = "Cet email est déjà utilisé";
            }
        } else {
            $error = "Tous les champs doivent être remplis";
        }
    }

    private function isFormValid()
    {
        return !empty($_POST['identifiant']) && !empty($_POST['password']) && !empty($_POST['email']) &&
            !empty($_POST['commentaire']); 
    }
}
