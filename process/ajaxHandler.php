<?php
include_once "../bootstrap/init.php";
if (!is_request_ajax()) {
    diepage("Request is Invalid!");
}
if (!isset($_POST['action']) || empty($_POST['action'])) {
    diepage("Invalid Action");
}

switch ($_POST['action']) {
    case 'addNewFolder':
        if (!isset($_POST['foldername']) || strlen($_POST['foldername']) <= 2) {
            diepage("نام فولدر باید بیشتر از 2 حرف باشد");
        } else {
            echo addFolder($_POST['foldername']);
        }
        break;
    case 'addNewTask':
        if (!isset($_POST['Task']) || strlen($_POST['Task']) <= 2) {
            diepage("عنوان تسک باید بیشتر از 2 حرف باشد");
        } else {
            if ($_POST['folder_id'] == 0) {
                die("فولدر مورد نظر را انتخاب کنید");
            } else {
                echo addTask($_POST['Task'], $_POST['folder_id']);
            }
        }

        break;

    default:
        diepage("Request is Invalid!");
        break;
}
