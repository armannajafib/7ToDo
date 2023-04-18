<?php
defined('BASE_PATH') or die('permision denied');
include_once BASE_PATH . "bootstrap/init.php";
if (isset($_GET['logout'])) {
    logout();
}
function is_Logged()
{
    return $_SESSION['login'] ? true:false;
}
function getUserByEmail($email)
{
    global $pdo;
    $userId = getuserId();
    $sql = "select * from users where email =:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":email" => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}
function register($userData)
{
    global $pdo;
    #validation pass,email,UserName
    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)";
    $passHash = password_hash($userData['passReg'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $userData['userNameReg'], ':email' => $userData['emailReg'], ':password' => $passHash]);
    return $stmt->rowCount() ? true : false;
}
function login($email, $pass)
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    } else {
        
        if (password_verify($pass,$user->password)) {
            $_SESSION['login']=$user;
            return true;
        }
    }
}
function logout(){
    unset($_SESSION['login']);
}
