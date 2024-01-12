<?php
namespace Myapp\controller;

use Myapp\model\WikiModel;

require '../../vendor/autoload.php';

session_start();

class WikiController
{
    public static function addWiki() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-w'])) {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $contenu = $_POST['contenu'];
            $categorieId = $_POST['categorie_id'];
            $archiver = 0;
            $userId = 1;
            $image = $_FILES['image']['name'];
            $file_temp = $_FILES['image']['tmp_name'];
            $upload_image = "../../public/images/" . $image;
            $tag = $_POST['tag_id'];
            
 
            if (move_uploaded_file($file_temp, $upload_image)) 
            {
             WikiModel::createWiki($titre, $description, $contenu, $upload_image,$archiver, $categorieId, $userId, $tag);
             
               header('location:../../views/admin/Admindash.php');
            }
         }
        
    }

    public static function listWikis()
    {
         
            $wikis=WikiModel::getWikis();
            return $wikis;
        
        
    }
    public static function listWikibyId()
    {
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $wiki = WikiModel::getWikiId($id);
        
            header("location:../../views/admin/Admindash.php");
            return $wiki;
            
        } 
        
    }
    public static function deletewiki(){
        if (isset($_POST['delete'])) 
        {
            $id = base64_decode($_GET['id']);
            WikiModel::deleteWiki($id);
            header("location:../../views/admin/Admindash.php"); 
        }
    }
}

$wiki = WikiController::addWiki();
$wiki = WikiController::deletewiki();


?>