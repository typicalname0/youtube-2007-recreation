<?php
    $mysqli = new mysqli("127.0.0.1", "pmauser", "dear1234", "youtube07");
    session_start();
?>
<span style="float: right; margin-right: 5px;margin-top:3px;font-size: small;"><a href="aregister.php">Sign Up</a> | <a href="account.php">My Account</a> | <a href="help.php">Help</a> | <a href="alogin.php">Login</a></span>
<a href="index.php"><img src="pic_youtubelogo_123x63-vfl14287.gif"></a><br><br>
<span style="float: right; margin-right: 5px;margin-top:3px;font-size: small;"><a href="upload.php">Upload</a></span>
<center>
    <a href="videos.php"><button type="button">Videos</button></a>
    <a href="channels.php"><button type="button">Channels</button></a>
    <a href="community.php"><button type="button">Community</button></a>
</center>
<div class="header">
    <br>
    <center><input type="text" placeholder=""> <button type="button">Search</button></center>
</div>