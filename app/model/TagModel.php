<?php
namespace Myapp\model;

use Myapp\DAO\TagDAO;

class TagModel
{
    private $id;
    private $NomTag;

    public function __construct($id, $NomTag)
    {
        $this->id=$id;
        $this->NomTag=$NomTag;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNomTag()
    {
        return $this->NomTag;
    }
    public function setNomTag($NomTag)
    {
        return $this->NomTag=$NomTag;
    }
    
    public static function addTag($NomTag)
    {
      return TagDAO::addTag($NomTag);
    }
    public static function getAllTags()
    {
      return TagDAO::getAllTags();
    }
    public static function getTagbyName($NomTag)
    {
      return TagDAO::getTagbyName($NomTag);
    }
    public static function  updateTag($id, $NomTag)
    {
       return TagDAO::updateTag($id, $NomTag);
    }
    public static function deleteTag($id)
    {
       return TagDAO::deleteTag($id);
    }
}



?>