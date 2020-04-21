<?php
    $mysqli = new mysqli("127.0.0.1", "username", "password", "database");
    session_start();
?>
<style>
    body {
        padding: 0px;
        margin: auto;
        width: 50em; /* We need more SPACE! */
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
    hr{
        margin: 5px 0px; 
        border-style: dotted;
        border-width: 0.5px;
        border-color: #aaa;
    }
    .header{
        border-radius: 10px 10px 0 0;
        background: linear-gradient(#bbb, #ddd);
        display: flex;
        padding: 10px;
        margin-bottom: 20px;
    }
    .header center{
        text-align: unset;
        margin: auto;
    }
    body center{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    body center > *{
        margin: 0px 5px;
    }
    body center a button{
        cursor: pointer;
        color: #0022cc;
        font-weight: bold;
        font-size: 12px;
        padding: 7px 35px;
        border-radius: 5px 5px 0 0;
        border: 1px solid #ccddff;
        background: linear-gradient(#ffffff, #ccddff);
        border-bottom: 0px;
    }
</style>
<span style="float: right; margin-right: 5px;margin-top:3px;font-size: small;"><a href="aregister.php">Sign Up</a> | <a href="account.php">My Account</a> | <a href="help.php">Help</a> | <a href="alogin.php">Login</a></span>
<!-- header -->
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
<!-- header -->