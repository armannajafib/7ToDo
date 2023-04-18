<?php
include "./bootstrap/init.php";
$home_url = site_url();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $params = $_POST;
    if ($_GET['action'] == "register") {
if ($_POST['passReg'] == $_POST['rePassReg']) {
    $result = register($params);
    if (!$result) {
        Message("error in registeration");
    } else {
        Message("you are register now");
        echo "<a href='$home_url'>home page</a>";
    }
}
        } elseif ($_GET['action'] == "login") {
            $result = login($params['logEmail'], $params['logPassword']);
            if (!$result) {
                Message("eror in your login");
            }else {
                Redirect("index.php");
            }
        }
     else {
        echo diepage("password and repass are not same");
    }
}
include "./tpl/tpl-auth.php";
