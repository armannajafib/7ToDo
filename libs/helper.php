<?php

// function's place is here

function is_request_ajax(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function diepage($msg){
    echo "<div style='background-color: #eda4a4; margin: 50px auto; padding: 30px; border: 1px solid #641111; border-radius: 5px;'>$msg</div>";
    die();
}