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
}

function addFolder($folderName)
{
    global $pdo;
    $userId = getuserId();
    $sql = "INSERT INTO `folders`(`name`, `user_id`) VALUES (:name,:user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $folderName, ':user_id' => $userId]);
    return $stmt->rowCount();
    // header("location:http://7learn-arman.php/7todo");
}
function addTask($Task,$folderId)
{
    global $pdo;
    $userId = getuserId();
    $sql = "INSERT INTO `tasks`(`title`, `user_id`, `folder_id`) VALUES (:Task,:user_id,:folder_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':Task' => $Task, ':user_id' => $userId, ':folder_id'=>$folderId]);
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

function toggleTask($taskId)
{
    global $pdo;
    $userId = getuserId();
    $sql = "update `tasks` set is_done = 1 - is_done  where user_id =:userId and id =:taskId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':userId'=>$userId,':taskId'=>$taskId]);
    $records = $stmt->rowCount();
    return $records;
}

