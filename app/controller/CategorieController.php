<?php

namespace Myapp\controller;

use Exception;
use Myapp\DAO\CatégorieDAO;
use Myapp\model\CategorieModel;

require '../../vendor/autoload.php';

class CategorieController
{
    public function addCategorie()
    {
        try{
            if (isset($_POST['addCatg'])) {
                $categorie = $_POST['categorie'];
    
                CategorieModel::addCategories($categorie);
                header('location: ../../views/admin/Admindash.php');
            }
        }catch(Exception $r){
            echo $r->getMessage();
        }
    }

    public function editCategorie()
    {
        if (isset($_POST['editcatg'])) {
            $id= base64_decode($_GET['id']);
            $NomCatg = $_POST['nom'];

            CategorieModel::editCategorie($id, $NomCatg);
            header('location: ../../views/admin/Admindash.php');
        }
    }
    public function deleteCategotie()
    {
        if (isset($_GET['idd'])) {
            $id = base64_decode($_GET['idd']);

            CatégorieDAO::deleteCategorie($id);
            header('location: ../../views/admin/Admindash.php');
        }
    }
    public static function showCategories()
    {
       $catgs = CategorieModel::getAllCategories();
       return $catgs;
    }
    
}

$ctg = new CategorieController;
$ctg->addCategorie();
$ctg->editCategorie();
$ctg->deleteCategotie();

?>