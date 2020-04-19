<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("header.php");
?>
<br><br>

<div class="topLeft">
    <div class="message" style="">
        Never give your password to a stranger!
    </div>
    <br>

    <form method='post' action=''>
        <label>Username</label><br>
        <input type="text" name="name" pattern="[^()/><\][\\\x22,;|]+" required><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" class="btn" name="reg_user" class="button">Register</button>
    </form>


    <?php
    if (@$_POST){
        //i should add captcha support lol but cloudfront breaks it
        $sql = "SELECT `username` FROM `users` WHERE `username`='". htmlspecialchars($_POST['name']) ."'";
        $result = $conn->query($sql);
        if($result->num_rows >= 1) {
            echo "Username already exists, try something else.";
        } else {
            $stmt = $conn->prepare("INSERT INTO `users` (`date`, `username`, `email`, `password`) VALUES (now(), ?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password);

            $username = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->execute();
            $stmt->close();

            $conn->close();
            echo "<br><br>Sucessfully made a Youtube07 account!<br><a href='alogin.php'>CLICK HERE TO LOGIN</a>";
        }
    }
    ?>
</div>

<div class="topRight">
    <small>
        Join the largest worldwide video-sharing community!<br>
        &bull;    Search and browse millions of commmunity and partner videos<br>
        &bull;    Comment, rate, and make video responses to your favorite videos<br>
        &bull;    Upload and share your videos with millions of other users<br>
        &bull;    Save your favorite videos to watch and share later<br>
    </small>
</div>