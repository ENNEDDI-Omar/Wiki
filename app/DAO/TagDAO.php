<?php
namespace Myapp\DAO;

use Myapp\database\Database;

require '../../vendor/autoload.php';


class TagDAO
{
    public static function addTag($NomTag)
    {
        try {
            $con = Database::connect();
            $requete = "INSERT INTO `tag`(`nom_tag`) 
                        VALUES (:Tnom)";
            $stmt= $con->prepare($requete);
            $stmt->bindParam(':Tnom', $NomTag);
            $stmt->execute();
                        
        } catch (\PDOException $e) {
            die("Erreur de requete d'insertion de tag: " . $e->getMessage());
        }
    }
    public static function getAllTags()
    {
        try {
            $con = Database::connect();
            $requete = "SELECT * FROM `tag`";
            $stmt = $con->prepare($requete);
            $stmt->execute();
            $tags = $stmt->fetchAll(\PDO::FETCH_ASSOC);
             return $tags;
        } catch (\PDOException $e) {
            die("Erreur de requete de selection de tags: " . $e->getMessage());
        }
    }
    public static function getTagbyName($NomTag)
    {
        try {
            $con = Database::connect();
            $requete = "SELECT * FROM `tag` WHERE `nom_tag` = :Tnom";
            $stmt = $con->prepare($requete);
            $stmt->bindParam(':Tnom', $NomTag);
            $stmt->execute();
            $tagN = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $tagN;
        } catch (\PDOException $e) {
            die("Erreur de requete de selection TagN: " . $e->getMessage());
        }
    }
    public static function updateTag($tagId, $NomTag)
    {
        try {
            $con = Database::connect();

            $requete = "UPDATE `tag` SET `nom_tag`= :nouveauTnom WHERE `id` = :id";
            $stmt = $con->prepare($requete);
            $stmt->bindParam(':nouveauTnom', $NomTag);
            $stmt->bindParam(':id', $tagId);
            $stmt->execute();

        } catch (\PDOException $e) {
            die("Erreur de requete de mise à jour de tag: " . $e->getMessage());
        }
    }
    public static function deleteTag($tagId)
    {
        try {
            $con = Database::connect();
            $requete = "DELETE FROM `tag` WHERE `id`";
            $stmt= $con->prepare($requete);
            $stmt->bindParam(':id', $tagId);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Erreur de requete de supression de tag: " . $e->getMessage());
        }
    }

}


























?>