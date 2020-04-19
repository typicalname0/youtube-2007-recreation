<?php
include("header.php");
?>
<br>
<div class="message" style="">
    Thanks for registering.<br>
    Here are some things I'm adding into this crappy 2007 youtube recreation:<br>
    - uploading<br>
    - admin panel<br>
    - better code<br>
    and hopefully...<br>
    - opensourcing this project<br>
</div>
<br>
<form method="post" action="alogin.php">
<div class="input-group">
    <label>Username</label><br>
    <input type="text" name="name"><br>

    <label>Email</label><br>
    <input type="email" name="email"><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit" class="btn" name="reg_user" class="button">Login</button>
</form>
<?php
if($_POST) {
    $sql = "SELECT password FROM `users` WHERE username='" . htmlspecialchars($_POST['name']) .  "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $hash = $row['password'];
        if(password_verify($_POST['password'], $hash)){
            session_start();

            $_SESSION["profileuser3"] = htmlspecialchars($_POST['name']);
            echo 'Logged in! <br>Click <a href="index.php">here</a> to go to back<br>';
        } else {
            echo 'Invalid password/email/username';
        }
    }
}
?>