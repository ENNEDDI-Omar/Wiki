<?php
namespace Myapp\model;

use Myapp\DAO\CatégorieDAO;

require '../../vendor/autoload.php';


class CategorieModel
{
    private $id;
    private $NomCategorie;

    public function __construct($id, $NomCategorie)
    {
        $this->id = $id;
        $this->NomCategorie = $NomCategorie;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getNomCategorie()
    {
        return $this->NomCategorie;
    }
    public function setNomCategorie($NomCategorie)
    {
        $this->NomCategorie = $NomCategorie;
    }


    public static function getAllCategories()
    {
        return CatégorieDAO::getAllCategories();
    }
    public static function addCategories($NomCategorie)
    {
        return CatégorieDAO::addCategorie($NomCategorie);
    }
    public static function getCategoriebyId($id)
    {
        return CatégorieDAO::getCategoriebyId($id);
    }
    public static function getCategoriebyName($NomCategorie)
    {
        return CatégorieDAO::getCategoriebyName($NomCategorie);
    }
    public static function editCategorie($id, $NomCategorie)
    {
        return CatégorieDAO::updateCategorie($id, $NomCategorie);
    }
    public static function deleteCategorie($id)
    {
        return CatégorieDAO::deleteCategorie($id);
    }


}









?>