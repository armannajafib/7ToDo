<?php
include "constans.php";
include "config.php";
include "./libs/helper.php";
include "./vendor/autoload.php";

try {
    $dbh = new PDO("mysql:dbname=$database_config->db;host=$database_config->host",$database_config->username, $database_config->password);
} catch (PDOException $e) {
    diepage($e->getMessage());//function(message)
}