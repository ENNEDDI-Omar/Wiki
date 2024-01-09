<?php
namespace Myapp\model;
require '../../vendor/autoload.php';

use Myapp\DAO\UserDAO;

class UserModel
{
  private $id;
  private $nom;
  private $prenom;
  private $email;
  private $password;
  private $profil;
  private $roleId;

  public function __construct($id, $nom, $prenom, $email, $password, $profil, $roleId)
  {
      $this->id = $id;
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
      $this->password = $password;
      $this->profil = $profil;
      $this->roleId = $roleId;
  }

  public function getId()
  {
      return $this->id;
  }

  public function getNom()
  {
      return $this->nom;
  }

  public function setNom($nom)
  {
      $this->nom = $nom;
  }
  public function getPrenom()
  {
      return $this->prenom;
  }

  public function setPrenom($prenom)
  {
      $this->prenom = $prenom;
  }

  public function getEmail()
  {
      return $this->email;
  }

  public function setEmail($email)
  {
      $this->email = $email;
  }

  public function getPassword()
  {
      return $this->password;
  }

  public function setPassword($password)
  {
      $this->password = $password;
  }

  public function getProfil()
  {
      return $this->profil;
  }

  public function setProfil($profil)
  {
      $this->profil = $profil;
  }

  public function getRoleId()
  {
      return $this->roleId;
  }

  public function setRoleId($roleId)
  {
      $this->roleId = $roleId;
  }

  public static function getAllUsers()
  {
     $allusers = UserDAO::getAllUsers();
      return $allusers;
  }

  public static function getUserById($userId)
  {  
        $userbyId= UserDAO::getUserbyId($userId);
      return  $userbyId;

    
  }
  public static function registerUser($nom, $prenom, $email, $password, $profil, $roleId)
  {
     UserDAO::creatUser($nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT), $profil, $roleId);
  }

  public static function logUser($email, $password)
    {
        $user = UserDAO::getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }

}






?>