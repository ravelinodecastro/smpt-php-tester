<?php

require "bootstrap.php";

// $_POST = json_decode(file_get_contents('php://input'), true);
if ($_POST){
    require "mail.php";
}
else {
    require "view.php";
}
