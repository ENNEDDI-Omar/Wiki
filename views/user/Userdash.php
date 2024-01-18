<?php
require '../../vendor/autoload.php';
use Myapp\controller\AuthController;



session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 2) {
    echo "Debug: role_admin is not set or not equal to 1"; // Debug output
    header('Location: ../auth/login.php');
    exit; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
</body>
</html>