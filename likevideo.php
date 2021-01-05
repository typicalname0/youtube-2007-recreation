<?php include 'global.php';?>
<?php
include("header.php");

session_start();
if(!isset($_SESSION['profileuser3'])) {
    die("login to like...");
} else {
    if(!isset($_GET['id'])){
        die("no");
    } else {
        if(isset($_SESSION['liked' . $a])) {
            die("u cant like a video once uve already liked it bro");
        }
        $a = (int)$_GET['id'];
        mysqli_query($conn, "UPDATE videos SET likes = likes+1 WHERE id = '" . (int)$_GET['id'] . "'");


        $_SESSION['liked' . $a] = true;
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
?>
<?php $mysqli->close();?>