<?php

namespace Myapp\controller;

use Myapp\DAO\UserDAO;
use Myapp\model\UserModel;

require '../../vendor/autoload.php';

class AuthController
{

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-up'])) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $email = $_POST['Email'];
            $password = $_POST['password'];
            $file_name = $_FILES['Profil']['name'];
            $file_temp = $_FILES['Profil']['tmp_name'];
            $upload_image = "../../public/images/" . $file_name;
            $roleId = 2;

            if (move_uploaded_file($file_temp, $upload_image)) {
                UserModel::registerUser($nom, $prenom, $email, $password, $upload_image, $roleId);
                
                header('location:../../views/auth/login.php');
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-in'])) {
            
            session_start();
            $email = $_POST['Email'];
            $password = $_POST['password'];
            
            $userControl = UserModel::logUser($email, $password);

            if ($userControl) {
                $user = UserDAO::getUserbyEmail($email);
                
                if ($user['role_id'] == 1) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['admin_image'] = $user['profil'];
                    $_SESSION['role'] = $user['role_id'];
                    header('Location: ../../views/admin/Admindash.php');
                    exit();
                } elseif ($user['role_id'] == 2) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_image'] = $user['profil'];
                    $_SESSION['role'] = $user['role_id'];
                    
                    header('Location: ../../views/user/Userdash.php');
                    exit();
                }
            }
        }
    }
    public static function getUsers()
    {
        $users = UserModel::getAllUsers();
        return $users;
    }
}

$auth = new AuthController();
$auth->registerUser();
$auth->login();
$auth = AuthController::getUsers();
