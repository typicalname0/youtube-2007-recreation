<?php include 'global.php';?>
<?php
include("header.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<div class="topLeft">
    <?php
        $stmt = $conn->prepare("SELECT * FROM videos WHERE id = ?");
        $stmt->bind_param("s", $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        while($row = $result->fetch_assoc()) {
            echo '
            <h2>' . $row['videotitle'] . '</h2>
            <video width="320" height="240" controls>
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
                Your browser does not support the video tag.
            </video> ';

            $videoembed = '
            <video width="320" height="240" controls>
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
                Your browser does not support the video tag.
            </video> ';
            $videoid = $row['id'];
        }
        mysqli_query($conn, "UPDATE videos SET views = views+1 WHERE id = '" . $videoid . "'");
        $stmt->close();
        echo "<hr>";
        echo "<h3>Comments & Responses</h3>";

        if(isset($_POST['submit'])) {
            if(!isset($_SESSION['profileuser3'])) {
                die("Please login to comment.");
            }
            else {
                $stmt = $conn->prepare("INSERT INTO comments (tovideoid, author, comment, date) VALUES (?, ?, ?, now())");
                $stmt->bind_param("sss", $_GET['id'], $_SESSION['profileuser3'], $comment);
    
                $comment = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
    
                $stmt->execute();
                $stmt->close();

                header("Refresh:0");
            }
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data"><br>
        Comment: <br><textarea name="bio" rows="4" cols="40" required="required"></textarea><br><br>
        <input type="submit" value="Upload" name="submit">
    </form>
    <hr>
    <?php
        $stmt = $conn->prepare("SELECT * FROM comments WHERE tovideoid = ?");
        $stmt->bind_param("s", $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        while($row = $result->fetch_assoc()) {
            echo "<div class='commenttitle'>" . $row['author'] . " (" . $row['date'] . ")</div>" . $row['comment'] . "<br><br>";
        }
        $stmt->close();
    ?>
</div>

<div class="topRight">
    <div class="message">
        <?php
            $stmt = $conn->prepare("SELECT * FROM videos WHERE id = ?");
            $stmt->bind_param("s", $_GET['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
                echo "Added: " . $row['date'] . "<br>";
                echo "" . $row['views'] . " views<br>";
                echo "" . $row['likes'] . " likes<br>";
                echo "From: " . $row['author'] . "<br><br>";
                echo "<br>'" . $row['description'] . "'<br>";
                echo "<a href='likevideo.php?id=" . $row['id'] . "'>Like Video</a>";
            }
            $stmt->close();

        ?>  
    </div>
        <br>
    <div class="message">
        <?php
            $stmt = $conn->prepare("SELECT * FROM videos WHERE id = ?");
            $stmt->bind_param("s", $_GET['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
                echo "Video URL (to post in discord):";
                echo "<hr>";
                echo "https://atari0.cf/youtube07/videos/" . $row['filename'];
                echo "</div><br><div class='message'>HTML5:<br>" . htmlspecialchars($videoembed) . "</div>";
            }
            $stmt->close();

        ?>  
    </div>
</div>
<?php $mysqli->close();?>