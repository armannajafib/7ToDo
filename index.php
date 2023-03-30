<?php
include "bootstrap/init.php";
// $tasks=[1,2,3,4,5];
if (isset($_GET['deleteFolder']) && is_numeric($_GET['deleteFolder'])) {
    $rowCountDelete=getDeleteFolder($_GET['deleteFolder']);
    // echo "$rowCountDelete rows sucessfully deleted!";
    header("location:http://7learn-arman.php/7todo");
}
if (isset($_GET['deleteTask']) && is_numeric($_GET['deleteTask'])) {
    $rowCountDelete=getDeleteTask($_GET['deleteTask']);
    // echo "$rowCountDelete rows sucessfully deleted!";
}
$folders=getfolder();
$tasks=gettask();
// dd($tasks);
include "tpl/tpl-index.php";