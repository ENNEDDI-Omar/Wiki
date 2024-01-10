<?php

namespace Myapp\DAO;

use Myapp\database\Database;

require '../../vendor/autoload.php';

class CatégorieDAO 
{
    public static function addCategorie($nom_categorie)
    {
        try {
            $conx = Database::connect();
            $requete = "INSERT INTO `categorie`(`nom_categorie`) 
                        VALUES (:name)";
            $stmt = $conx->prepare($requete);
            $stmt->bindParam(':name', $nom_categorie);    
            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erreur dans l'insertion de catg: " . $e->getMessage();
        }        
    }
    public static function getAllCategories()
    {
        try {
            $conx = Database::connect();
            $requete = "SELECT * FROM categorie";
            $stmt = $conx->prepare($requete);
            $stmt->execute();
            $catgs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $catgs;
        } catch (\PDOException $e) {
            echo "Erreur dans la selection des catgs : " . $e->getMessage();
        }
    }

    public static function getCategoriebyId($Id_Categorie)
    {
        try {
              $conx = Database::connect();
              $requete = "SELECT * FROM `categorie` WHERE `id` = :id";
              $stmt = $conx->prepare($requete);
              $stmt->bindParam(':id', $Id_Categorie);
              $stmt->execute();
              $catg_id = $stmt->fetch(\PDO::FETCH_ASSOC);

              return $catg_id;
        } catch (\PDOException $e) {
            echo "Erreur dans la requete de selection de catg par id: " . $e->getMessage();        
        }
    }

    public static function getCategoriebyName($nom_categorie)
    {
        try {
            $conx = Database::connect();
            $requete = "SELECT * FROM `categorie` WHERE `nom_categorie` = :nom";
            $stmt = $conx->prepare($requete);
            $stmt->bindParam(':nom', $nom_categorie);
            $stmt->execute();
            $ctgN = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $ctgN;
        } catch (\PDOException $e) {
            echo "Erreur de Selection par nom: " . $e->getMessage();
            return null;
        }
    }

    public static function updateCategorie($Id_Categorie, $nouveauNom)
    {
        try {
            $con = Database::connect();
            $requete = "UPDATE `categorie` SET `nom_categorie`= :nouveauNom WHERE `id` = :id";
            $stmt = $con->prepare($requete);
            $stmt->bindParam(':nouveauNom', $nouveauNom);
            $stmt->bindParam(':id', $Id_Categorie);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo "Erreur dans la mise à jour de catg: " .$e->getMessage();
            return false;
        }
    }

    public static function deleteCategorie($Id_Categorie)
    {
       try {
        $conx = Database::connect();

        $requete = "DELETE FROM `categorie` WHERE `id` = :id";
        $stmt = $conx->prepare($requete);
        $stmt->bindParam(':id', $Id_Categorie);
        $stmt->execute();

       } catch (\PDOException $e) {
        echo "Erreur dans la Suppression: " . $e->getMessage();
       }
    }
}

?>