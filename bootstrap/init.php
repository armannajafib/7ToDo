<?php
include "constans.php";
include BASE_PATH."bootstrap/config.php";
include BASE_PATH."libs/helper.php";
include BASE_PATH."vendor/autoload.php";

try {
    $pdo = new PDO("mysql:dbname=$database_config->db;host=$database_config->host",$database_config->username, $database_config->password);
} catch (PDOException $e) {
    diepage($e->getMessage());
}
include BASE_PATH."libs/lib-tasks.php";
include BASE_PATH."libs/lib-auth.php";