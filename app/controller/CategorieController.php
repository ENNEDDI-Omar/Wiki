<?php

namespace Myapp\controller;

use Myapp\DAO\CatégorieDAO;
use Myapp\model\CategorieModel;

require '../../vendor/autoload.php';

class CategorieController
{
    public function addCategorie()
    {
        if (isset($_POST['addCatg'])) {
            $categorie = $_POST['categorie'];

            CategorieModel::addCategories($categorie);
            header('location: ../../views/admin/Admindash.php');
        }else {
            echo "Erreur d'insertion de catg";
        }
    }

    public function editCategorie()
    {
        if (isset($_POST['editcatg'])) {
            $id= base64_decode($_GET['id']);
            $NomCatg = $_POST['nom'];

            CategorieModel::editCategorie($id, $NomCatg);
            header('location: ../../views/admin/Admindash.php');
        }else {
            echo "Erreur de l'update de catgs";
        }
    }
    public function deleteCategotie()
    {
        if (isset($_POST['deleteC'])) {
            $id = base64_decode($_GET['id']);

            CatégorieDAO::deleteCategorie($id);
            header('location: ../../views/admin/Admindash.php');
        }else {
            echo "Erreur de Suppression";
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