<?php
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