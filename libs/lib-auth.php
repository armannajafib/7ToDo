<?php
defined('BASE_PATH') or die('permision denied');
include_once BASE_PATH . "bootstrap/init.php";
function is_Logged()
{
    return  false;
}
function register($userData){
    global $pdo;
    #validation pass,email,UserName
    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)";
    $passHash=password_hash($userData['passReg'],PASSWORD_BCRYPT);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $userData['userNameReg'], ':email' => $userData['emailReg'],':password' => $passHash]);
    return $stmt->rowCount() ? true : false;
}
function login($userDataLogin){
    return 1;
}