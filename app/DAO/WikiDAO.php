<?php
namespace Myapp\DAO;

use Myapp\database\Database;
use PDO;

require '../../vendor/autoload.php';

class WikiDAO
{   public static function getAllWikis()
    {
        $conx = Database::connect();
        $requete = "SELECT w.*, u.nom, u.prénom, c.nom_categorie
                    FROM wiki AS w
                    INNER JOIN user AS u ON u.id = w.user_id
                    INNER JOIN categorie AS c ON c.id = w.categorie_id";
        $stmt = $conx->prepare($requete);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;            
    }
    
    public static function getWikibyId($id)
    {
        $conx = Database::connect();
        $requete = "SELECT w.* FROM wiki AS w
                    INNER JOIN user AS u ON w.user_id = u.id WHERE u.id=:id";
        
        $stmt=$conx->prepare($requete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function createWiki($titre, $description, $contenu, $image, $archiver, $categoriId, $userId, $tags)
    { 
        try {
            $conx = Database::connect();

         $requete = "INSERT INTO `wiki`(`titre`, `description`, `contenu`, `image`, `archiver`, `categorie_id`, `user_id`) VALUES (? , ? , ? , ? , ? , ? , ?)";

          $stmt = $conx->prepare($requete);
          $result=$stmt->execute([$titre , $description , $contenu , $image , $archiver , $categoriId , $userId]);
          $lastInsertId = $conx->lastInsertId();
         
         if ($result) 
         {
            
            $requete2 = "INSERT INTO `tag_wiki`(`tag_id`, `wiki_id`) 
                        VALUES (:id_tag, :id_wiki)";
            $stmt=$conx->prepare($requete2);
            $stmt->bindParam(':id_tag', $tags);
            $stmt->bindParam(':id_wiki', $lastInsertId);
            $stmt->execute();
         }else {
            echo "Erreur d'insertion de wiki2";
         }
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function deleteWiki($id)
    {
        try {
            $conx = Database::connect();
            $requete = "DELETE FROM `wiki` WHERE `id`=:id";

            $stmt=$conx->prepare($requete);
            $stmt->bindParam(':id', $id);
            $result=$stmt->execute();

            if ($result) {
                $requete="DELETE FROM `tag_wiki` WHERE `wiki_id`=:id";
                $stmt= $conx->prepare($requete);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            }else {
                echo "Erreur de suppression de wiki";
            }


        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();      
        }
    }

}


?>