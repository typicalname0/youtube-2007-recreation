<?php
include("header.php");
?>

<!-- this will be moved to a file named global.css where we store all global css rules -->
<style type="text/css">
    .container-flex{
        display: flex;
    }
    /* Bootstrap-like grid system */
    /* Two numbers acting like a fraction */
    .col-1-2{
        flex: 1 1 50%;
        padding: 5px;
    }
    .col-1-3{
        flex: 1 1 33.33%;
        padding: 5px;
    }
    .col-2-3{
        flex: 1 1 66.66%;
        padding: 5px;
    }
    html, body{
        font-family: "Arial", "Helvetica", sans-serif;
    }
    .card.login .card-header{
        border-radius: 7px 7px 0 0;
        background: #ccc;
        padding: 5px;
        font-weight: bold;
        font-size: 14px;
    }
    .card.login .card-content{
        padding: 10px;
        border: 1px solid #ccc;
        border-top: 0px;
        font-size: 12px;
    }

    .card.message{
        color: #000;
        background-color: #ffffdd;
        border: 1px solid #ffddaa;
        padding: 7px 15px;
        font-size: 12px;
        border-radius: 7px;
    }
    .card.message .card-header{
        font-weight: bold;
        color: #aa6600;
        margin-bottom: 7px;
        font-size: 16px;
    }
    a{
        color: #0022cc;
    }
</style>

<style type="text/css">
    /* page-specific css rules */
    .video-info{
        color: #666;
        font-size: 11px;
    }
    .video-info div span{
        color: #000;
    }
    .video-info{
        flex: 1 0 5em;
    }
    .video-title a{
        text-decoration: none;
        font-weight: bold;
    }
    .video-thumbnail{
        flex: 0 0 120px;
        border: 1px solid #fff;
        outline: 1px solid #999;
        background: #000;
        width: 120px;
        height: 72px;
        padding: 0px;
    }
    .video-thumbnail video{
        width: 100%;
        height: 100%;
    }

</style>

<div class="container-flex">
    <div class="col-2-3">
        <h2>Featured Videos</h2>
        <?php
            $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY id DESC"); //sexy variable names
            //$statement->bind_param("s", $_POST['fr']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows === 0) exit('No rows');
            echo "<div class='featuredvideos'>"; //Please do not do this. Thanks. Next time, maybe add a flag for videos that are featured in the DB?
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
            $mysqli = new mysqli("localhost", "for real", "for real", "this time");
            if($_POST !== null) {
                if(isset($_POST['button2'])) {
                    $sql = "SELECT password FROM `users` WHERE username='" . htmlspecialchars($_POST['name']) .  "'";
                    $result = $mysqli->query($sql);
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
            $statement = $mysqli->prepare("SELECT * FROM videos");
            //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows === 0) exit('No rows');
            echo "<div class='videos'>";
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="video container-flex">
                    <div class="col-1-3 video-thumbnail">
                    <video>
                        <source src="videos/'.$row['filename'].'" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> 
                    </div>
                    <div class="col-1-3 video-title"><a href="viewvideo.php?id='.$row['id'].'">'.$row['videotitle'].'</a></div>
                    <div class="col-1-3 video-info">
                        <div>From: <a href="channelview.php?id='.$row['author'].'">'.$row['author'].'</a></div>
                        <div>Views: <span>'.$row['views'].'</span></div>
                        <div>Likes: <span>'.$row['likes'].'</span></div>
                    </div>
                </div>
                <hr>';
            }
            $statement->close();
            echo "</div>";
        ?>
    </div>
    <div class="col-1-3">
        <div class="card login">
            <div class="card-header">
                Member Login
            </div>
            <div class="card-content">
                <form method="post" action="">
                    <div class="input-group">
                        <label>Username</label>
                        <input type="text" name="name">
                    </div> 
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email">
                     </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password">
                    </div>
                    <button type="submit" class="btn" name="button2" class="button">Login</button>
                </form>
            </div>
        </div>
        <div class="card message">
            <div class="card-header">What's New</div>
            CARTI LYRICS CANNOT BE TRANSCRIBED
        </div>
    </div>
</div>