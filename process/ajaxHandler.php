<?php
// print_r($_POST['foldername']);
//action=addNewFolder
//folderName=input.val()
include_once "../bootstrap/init.php";
if (!is_request_ajax()) {
    diepage("Request is Invalid!");
}
if (!isset($_POST['foldername']) || empty($_POST['foldername'])) {
    diepage("درخواست خالی ارسال نمیشود!!");
}

switch ($_POST['action']) {
    case 'addNewFolder':
        if (strlen($_POST['foldername']) <= 2) {
            diepage("نام فولدر باید بیشتر از 2 حرف باشد");
        } else {
            echo addFolder($_POST['foldername']);
        }
        break;
        case 'addNewTask':
            # code...
            break;

    default:
        diepage("Request is Invalid!");
        break;
}
