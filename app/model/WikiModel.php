<?php
namespace Myapp\model;

use Myapp\DAO\WikiDAO;

require '../../vendor/autoload.php';


class WikiModel
{
    private $id;
    private $titre;
    private $desciption;
    private $contenu;
    private $date_creation;
    private $image;
    private $archiver;
    private $categorie_id;
    private $user_id;
    private $tags=[];

    public function __construct($titre, $desciption, $contenu, $date_creation, $image, $archiver, $categorie_id, $user_id)
    {    
        $this->titre=$titre;
        $this->desciption=$desciption;
        $this->contenu=$contenu;
        $this->date_creation=$date_creation;
        $this->image=$image;
        $this->archiver=$archiver;
        $this->categorie_id=$categorie_id;
        $this->user_id=$user_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function getArchive() {
        return $this->archiver;
    }

    public function setArchive($archiver) {
        $this->archiver = $archiver;
    }

    public function getCategoryId() {
        return $this->categorie_id;
    }

    public function setCategoryId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public static function getWikis()
    {
       $wikis=WikiDAO::getAllWikis();
       return $wikis;
    }
    public static function getWikiId($id)
    {
        $wiki=WikiDAO::getWikibyId($id);
        return $wiki;
    }
    public static function createWiki($titre, $desciption, $contenu, $image,$archiver, $categorie_id, $user_id, $tags)
    {
      WikiDAO::createWiki($titre, $desciption, $contenu,$image, $archiver, $categorie_id, $user_id, $tags);
    
    }
    public static function deleteWiki($id)
    {
      WikiDAO::deleteWiki($id);
    }


}













?>