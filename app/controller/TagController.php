<?php
namespace Myapp\controller;

use Myapp\model\TagModel;

require '../../vendor/autoload.php';

class TagController
{
    public static function addTag()
    {
        if (isset($_POST['addTag'])) {
            $tag = $_POST['tag'];

            TagModel::addTag($tag);
            header('location: ../../views/user/dash.php');
        }else {
            echo "Erreur d'insertion de tag";
        }
    }

    public static function editTag()
    {
        if (isset($_POST['editTag'])) {
            $id= base64_decode($_GET['id']);
            $NomTag = $_POST['tag'];

            TagModel::updateTag($id, $NomTag);
            header('location: ../../views/user/dash.php');
        }else {
            echo "Erreur de l'update de tag";
        }
    }
    public static function deleteTag()
    {
        if (isset($_POST['deleteTag'])) {
            $id = base64_decode($_GET['id']);

            TagModel::deleteTag($id);
            header('location: ../../views/user/dash.com');
        }else {
            echo "Erreur de Suppression";
        }
    }
    public static function showTags()
    {
         $tags = TagModel::getAllTags();
      return $tags;
    }
    
}












?>