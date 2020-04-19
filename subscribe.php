<?php
include("header.php");

session_start();
if(!isset($_SESSION['profileuser3'])) {
    die("login to subscribe...");
} else {
    if(!isset($_GET['subscribetoid'])){
        die("no");
    } else {
        $a = (int)$_GET['subscribetoid'];
        mysqli_query($conn, "UPDATE users SET subscribers = subscribers+1 WHERE id = '" . (int)$_GET['subscribetoid'] . "'");
        $a = (int)$_GET['subscribetoid'];

        $_SESSION['subscribedto' . $a] = true;
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
?>