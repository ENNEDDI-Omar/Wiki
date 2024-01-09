<?php
namespace Myapp\DAO;

use Myapp\database\Database;

require '../../vendor/autoload.php';


class UserDAO
{

  public static function creatUser($nom, $prenom, $email, $password, $profil, $role_id)
  {
    try 
    {
        $conx = Database::connect();

        $requete = "INSERT INTO `user`(`nom`, `prénom`, `email`, `password`, `profil`, `role_id`)
                    VALUES (:nom,:prenom,:email,:password,:profil,:role_id)";

            $stmt = $conx->prepare($requete);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':profil', $profil);
            $stmt->bindParam(':role_id', $role_id); 
            
            $stmt->execute();
    } catch (\PDOException $e) 
    {
        echo "Erreur:" . $e->getMessage();    
    }
  }

  public static function getUserbyEmail($email)
  {
    try 
    {
        $conx = Database::connect();

        $requete = "SELECT * FROM `user` WHERE `email`=':email'";

        $stmt = $conx->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user;
    } catch (\PDOException $e) 
    {
        echo "Erreur: " . $e->getMessage();
        return null;
    }
  }

  public static function getAllUsers()
  {
    try 
    {
        $conx = Database::connect();

        $requete = "SELECT * FROM user WHERE role_id = 2";

        $stmt = $conx->prepare($requete);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    } catch (\PDOException $e) 
    {
        echo "Erreur de selection des Utilisateurs: ". $e->getMessage();
        return null;
    }
  }

  public static function getUserbyId($userId)
  {
    try {
        $conx = Database::connect();

       $requete = "SELECT * FROM `user` WHERE id=:id";
       $stmt = $conx->prepare($requete);
       $stmt->bindParam(':id', $userId);
       $stmt->execute();
       $user = $stmt->fetch(\PDO::FETCH_ASSOC);

      return $user;
    } catch (\PDOException $e) {
        echo "Erreur de selection d'utilisateur par ID : ". $e->getMessage();
        return null;
    }
  }

  public static function updateUser($nom, $prenom, $email, $password, $profil)
  {
    try 
    {
        $conx = Database::connect();

        $requete = "UPDATE `user` 
                SET `nom`=':nom',`prénom`=':prenom',`email`=':email',`password`=':password',`profil`=':profil',`role_id`=':role_id' 
                WHERE 1";

         $stmt = $conx->prepare($requete);
         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':prenom', $prenom);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':password', $password);
         $stmt->bindParam(':profil', $profil);
    
      $result = $stmt->execute();
      return $result;
    } catch (\PDOException $e) 
    {
     echo "Erreur d'update user: " . $e->getMessage();
     return null;
    }
  }

  public static function deleteUser($id)
  {
    try {
       $conx = Database::connect();

       $requete = "DELETE FROM `user` WHERE `id`=:id";
       $stmt = $conx->prepare($requete);
       $stmt->bindParam(':id', $id);

       $result = $stmt->execute();
       return $result;
    } catch (\PDOException $e) {
        echo "Erreur de suppression: " . $e->getMessage();
    }
  }

}










?>