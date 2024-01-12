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
            header('location: ../../views/admin/Admindash.php');
        }
    }

    public static function editTag()
    {
        if (isset($_POST['editTag'])) {
            $id= base64_decode($_GET['id']);
            $NomTag = $_POST['tag'];

            TagModel::updateTag($id, $NomTag);
            header('location: ../../views/admin/Admindash.php');
        }
    }
    public static function deleteTag()
    {
        if (isset($_POST['deleteTag'])) {
            $id = base64_decode($_GET['id']);

            TagModel::deleteTag($id);
            header('location: ../../views/admin/Admindash.php');
        }
    }
    public static function showTags()
    {
         $tags = TagModel::getAllTags();
      return $tags;
    }
    
}



$tag = TagController::addTag();
$dtag = TagController::deleteTag();








?>