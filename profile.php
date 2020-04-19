<?php
include("header.php");
?>
<div class="topLeft">
    <?php
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("s", $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        while($row = $result->fetch_assoc()) {
            echo "<h2>About " . $row['username'] . "</h2>";
            echo "<small><span style='float: right;'><a href='profile.php?id=" . $row['id'] . "'>" . $row['username'] . "</a></span><br>";
            echo "<span style='float: right;'>" . $row['subscribers'] . " subscribers</span>";
            if(!isset($_SESSION['subscribedto' . $row['id']])) {
                echo "<br><span style='float: right;'><a href='subscribe.php?subscribetoid=" . $row['id'] . "'>Subscribe</a></span></small>";
            } else {
                echo "<br><span style='float: right;'>Already Subscribed</span>";
            }
            echo "<img style='width:100px;' src='pfp/" . $row['pfp'] . "'>";
            echo "<br><br>";
            echo "'" . $row['description'] . "'";
            $username = $row['username'];
        }

        $stmt = $conn->prepare("SELECT * FROM videos WHERE author = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "<h2>Videos</h2>";
        if($result->num_rows === 0) exit('<br>This user has no videos.');
        while($row = $result->fetch_assoc()) {
            echo '<div class="videothumbnail">
            <video width="130" height="97">
                <source src="videos/' . $row['filename'] . '" type="video/mp4">
                Your browser does not support the video tag.
            </video> 
            <small><a href="viewvideo.php?id=' . $row['id'] . '">' . $row['videotitle'] . '</a></small>
            <span style="float: right; margin-right: 5px;margin-top:3px;font-size: small;">From: <a href="channelview.php?id=' . $row['author'] . '">
            ' . $row['author'] . '
            <br>
            </a>
            Views: ' . $row['views'] . '
            <br>
            Likes: '. $row['likes'] . '
                </span>
            </div>';
        }
        $stmt->close();
    ?>
</div>

<div class="topRight">
    <?php
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    while($row = $result->fetch_assoc()) {
        if($row['username'] == "TypicalName") {
            echo "<div class='message'>";
            echo "This user is the owner of youtube07.";
            echo "</div>";
        }
    }
    $stmt->close();
    ?>
</div>