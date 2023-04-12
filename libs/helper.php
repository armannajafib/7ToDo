<?php
defined('BASE_PATH') OR die('permision denied');
// function's place is here

function is_request_ajax(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function site_url($uri = ""){
    return BASE_URL . $uri;
}

function diepage($msg){
    echo "<div style='background-color: #eda4a4; margin: 50px auto; padding: 30px; border: 1px solid #641111; border-radius: 5px;'>$msg</div>";
    die();
}
function dd($var){
    echo "<pre style='color: #cc4e0e; background-color: #fff; border-radius: 3px; border: 1px solid black; border-left: red; margin-left: 100px; padding: 3px; z-index: 99999999; position: relative;'>";
    var_dump($var);
    echo "</pre>";
}
function Message($msg,$class="info"){
    echo "<div class='$class' style='background-color: #eda4a4; margin: 50px auto; padding: 30px; border: 1px solid #641111; border-radius: 5px;'>$msg</div>";
}

//  function validateUsername() {
// if (preg_match('/^\w{5,}$/', $username)) {
//     # code...
// }
//  }
//  function validatePassword() {

//  }
//  function validateEmail() {

// }


// function validation(){

// }