<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="global.css">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container-flex">
        <div class="col-2-3">
            <h2>Featured Videos</h2>
            <?php
                $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY views DESC"); //sexy variable names
                //$statement->bind_param("s", $_POST['fr']);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
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
                }
                else{
                    echo "It seems there are no videos here. Perhaps one of your videos could be here?";
                }
            ?>
            <h2>Videos</h2>
            <?php
                $mysqli = new mysqli("localhost", "nigga", "niggacom", "youtube07");
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
                if($result->num_rows !== 0){
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
                    echo "</div>";
                }
                else{
                    echo "It seems there are no videos here. Why don't you upload one?";
                }
                $statement->close();
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
</body>