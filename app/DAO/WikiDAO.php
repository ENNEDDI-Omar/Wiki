<?php
namespace Myapp\DAO;

use Myapp\database\Database;

require '../../vendor/autoload.php';

class WikiDAO
{
    public static function AjoutWiki($titre, $description, $contenu, $date, $image, $archiver, $categoriId, $userId, $tags)
    { 
        $conx = Database::connect();

        $requete = "INSERT INTO `wiki`(`titre`, `description`, `contenu`, `date_creation`, `image`, `archiver`, `categorie_id`, `user_id`) 
                    VALUES (:titre, :descrip, :contenu, CURRENT_TIMESTAMP, img, archive, :Id_catg, :Id_user)";

        $stmt = $conx->prepare($requete);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':descrp', $description);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':archive', $archiver);
        $stmt->bindParam(':Id_catg', $categoriId);
        $stmt->bindParam(':Id_user', $userId);
        $lastInsertId = $conx->lastInsertId();
        $result=$stmt->execute();
         
        if ($result) {
            
            $requete = "INSERT INTO `tag_wiki`(`tag_id`, `wiki_id`) 
                        VALUES (:id_tag, :id_wiki)";
            $stmt=$conx->prepare($requete);
            $stmt->bindParam(':id_tag', $tags);
            $stmt->bindParam(':id_wiki', $lastInsertId);
        }


    }
}








?>