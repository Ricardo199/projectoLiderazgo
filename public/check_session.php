<?php
session_start();

$response = array("isLoggedIn" => false);

if (isset($_SESSION['login_user'])) {
    $response["isLoggedIn"] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
