<?php
include("header.php");
?>
<!-- header -->
<br>
<div class="topLeft">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['profileuser3'])){
    die("Please login to see your account.");
} else {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['profileuser3']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    while($row = $result->fetch_assoc()) {
        echo "<h2>Your Account Details</h2>";
        echo "<small>" . $row['username'] . "<br>";
        echo "<span class='float:right; margin-right: 5px;margin-top:3px;'>" . $row['subscribers'] . " subscribers</span>";
        echo "<br>Email: " . $row['email'] . "</small>";
        echo "<br><img style='width:100px;' src='pfp/" . $row['pfp'] . "'>";
        echo "<hr>";
        echo "<h2>Your Current Description</h2>";
        echo "" . $row['description'] . "";
        echo "<hr>";
        echo "<h2>Misc. Details</h2>";
        echo "Account creation date: " . $row['date'];
    }
    $stmt->close();
}

if (@$_POST['submit2']){
    $target_dir = "pfp/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            mysqli_query($conn, "UPDATE `users` SET `pfp` = '" . $_FILES["fileToUpload"]["name"] . "' WHERE `users`.`username` = '" . $_SESSION['profileuser3'] . "';");
            header("Refresh:0");
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo $_FILES["fileToUpload"]["error"];
        }
    }
}

if(@$_POST['submit']) {
    $stmt = $conn->prepare("UPDATE `users` SET `description` = ? WHERE `users`.`username` = '" . $_SESSION["profileuser3"] . "';");
    $stmt->bind_param("s", $description);

    $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Refresh:0");
}
?>

<hr>
<h2>Edit your settings</h2>
<form action="" method="post" enctype="multipart/form-data"><br>
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit2">
</form>
<form action="" method="post" enctype="multipart/form-data"><br>
    Bio: <br><textarea name="bio" rows="4" cols="50" required="required"></textarea><br><br>
    <input type="submit" value="Set" name="submit">
</form>

</div>


<div class="topRight">
    <div class="message">
        Looooo
    </div>
</div>