<?php
include("header.php");
?>


<!-- videos list -->
<div class="topLeft">
    <h2>Featured Videos</h2>
    <?php
    $stmt = $conn->prepare("SELECT * FROM videos ORDER BY id DESC");
    $stmt->bind_param("s", $_POST['fr']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    echo "<div class='featuredvideos'>";
    while($row = $result->fetch_assoc()) {
        if($row["videotitle"] == "haiti news") {
            echo '
            <a href="viewvideo.php?id=' . $row['id'] . '"><video width="130" height="97">
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
            Your browser does not support the video tag.
            </video></a>';
        }
        if($row["videotitle"] == "Boy Oh Boy - LISA OST") {
            echo '
            <a href="viewvideo.php?id=' . $row['id'] . '"><video width="130" height="97">
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
            Your browser does not support the video tag.
            </video></a>';
        }
        if($row["videotitle"] == "hired") {
            echo '
            <a href="viewvideo.php?id=' . $row['id'] . '"><video width="130" height="97">
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
            Your browser does not support the video tag.
            </video></a>';
        }

    }
    echo "</div>";
    ?>
    <h2>Videos</h2>
    <?php
    if($_POST) {
        if($_POST['button2']) {

            $sql = "SELECT password FROM `users` WHERE username='" . htmlspecialchars($_POST['name']) .  "'";
            $result = $conn->query($sql);
        
            while($row = $result->fetch_assoc()) {
                $hash = $row['password'];
                if(password_verify($_POST['password'], $hash)){
                    session_start();
        
                    $_SESSION["profileuser3"] = htmlspecialchars($_POST['name']);
                    echo 'Logged in.';
                } else {
                    echo 'Invalid password/email/username';
                }
            }
        } 
    }
    $stmt = $conn->prepare("SELECT * FROM videos");
    $stmt->bind_param("s", $_POST['fr']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    echo "<div class='videothumbnails'>";
    while($row = $result->fetch_assoc()) {
        echo '<div class="video">
                <video width="130" height="97">
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
                Your browser does not support the video tag.
            </video> 
            <small><a href="viewvideo.php?id=' . $row['id'] . '">' . $row['videotitle'] . '</a></small>
            <span style="float: right; margin-right: 5px;margin-top:3px;font-size: small;">From: <span class="videoauthor"><a href="channelview.php?id=' . $row['author'] . '"></span>
            ' . $row['author'] . '
            <br>
            </a>
            Views: <span class="videoviews">' . $row['views'] . '</span>
            <br>
            Likes: <span class="videolikes">'. $row['likes'] . '</span>
            </span>
            <hr></div>';
    }
    $stmt->close();
    echo "</div>";
    ?>
</div>
<!-- videos list -->

<!-- messages -->
<div class="topRight">
    <form method="post" action="">
        <fieldset>
        <legend>Member Login</legend>

            <div class="input-group">
            <label>Username</label><br>
            <input type="text" name="name"><br>
            </div>

            <div class="input-group">
            <label>Email</label><br>
            <input type="email" name="email"><br>
            </div>

            <div class="input-group">
            <label>Password</label><br>
            <input type="password" name="password"><br><br>
            </div>

            <div class="input-group">
            <button type="submit" class="btn" name="button2" class="button">Login</button>
            </div>
            </fieldset>
        </form>
    <small>
    <div class="message">
    <h3>What's New</h3>
    Nothing is new...
    <hr>
    <br>
    <br>
    </small>
    </div>
    <br>
</div>
<!-- messages -->
