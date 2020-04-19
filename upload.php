<?php
include("header.php");
?>

<div class="topLeft">
    <form action="" method="post" enctype="multipart/form-data"><br>
        Select video to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        
        <label for="videotitle">Video Title:</label><br>
        <input type="text" id="videotitle" name="videotitle"><br><br>

        Description: <br><textarea name="bio" rows="4" cols="50" required="required"></textarea><br><br>
        <input type="submit" value="Upload" name="submit">
    </form>
</div>

<div class="topRight">
    <div class="message">
        Uploading Rules:<br>
        - NO GORE/NSFW (video will be deleted)<br>
        - NO ILLEGAL VIDEOS (permenant ip ban off of atari0.cf)<br>
        - VIDEO METADATA IS NOT CORRUPTED (video will be deleted)<br>
        Thanks.<br>
    </div>
</div>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (@$_POST['submit']){
    if(!isset($_SESSION['profileuser3'])) {
        die("login to upload videos...");
    }
    $target_dir = "videos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (file_exists($target_file)) {
        echo "video with the same filename already exists.";
        $uploadOk = 0;
    }
    if($imageFileType != "mp4") {
        echo "MP4 files only.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "unknown error.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO videos (videotitle, description, author, filename, date) VALUES (?, ?, ?, ?, now())");
            $stmt->bind_param("ssss", $videotitle, $description, $author, $filename);

            $videotitle = htmlspecialchars($_POST['videotitle']);
            $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
            $author = htmlspecialchars($_SESSION['profileuser3']);
            $filename = basename($_FILES["fileToUpload"]["name"]);

            $stmt->execute();
            $stmt->close();
            header("Location: index.php");
        } else {
            echo "error!!!!!!!!!!!!!!!!!! error code: ";
            echo $_FILES["fileToUpload"]["error"];
        }
    }
}

?>
