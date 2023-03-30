<?php
defined('BASE_PATH') or die('permision denied');
function getuserId()
{
    return 1;
};
function getDeleteFolder($deleteFolderId)
{
    global $pdo;
    $userId = getuserId();
    $sql = "delete from folders where id=$deleteFolderId and user_id = $userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    
}
function getDeleteTask($deleteTaskId)
{
    global $pdo;
    $userId = getuserId();
    $sql = "delete from tasks where id=$deleteTaskId and user_id = $userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    // header("location:http://7learn-arman.php/7todo");
}

function addFolder($folderName)
{
    global $pdo;
    $userId = getuserId();
    $sql = "INSERT INTO `folders`(`name`, `user_id`) VALUES (:name,:user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $folderName, 'user_id' => $userId]);
    return $stmt->rowCount();
    // header("location:http://7learn-arman.php/7todo");
}
function getfolder()
{
    global $pdo;
    $userId = getuserId();
    $sql = "select * from folders where user_id=$userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
function gettask()
{
    global $pdo;
    $userId = getuserId();
    $folderId = $_GET['folder_id'] ?? null;
    $folderCondition='';
    if (isset($folderId)&& is_numeric($folderId)) {
        $folderCondition="and folder_id=$folderId";
    }
    $sql = "select * from tasks where user_id=$userId $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}
