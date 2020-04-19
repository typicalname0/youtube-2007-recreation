<?php
$conn = new mysqli("localhost", "username", "password", "database");
session_start();
?>
<style>
.header {
    border-top-left-radius: 10px 10px;
    border-top-right-radius: 10px 10px;
    background: #b8b8b8; /* Old browsers */
    background: -moz-linear-gradient(top,  #b8b8b8 0%, #7a7a7a 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  #b8b8b8 0%,#7a7a7a 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom,  #b8b8b8 0%,#7a7a7a 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b8b8b8', endColorstr='#7a7a7a',GradientType=0 ); /* IE6-9 */
}
.header p {
    color: white;
}
body {
    padding: 0px;
    margin: auto;
    width: 45em;
    font-family: Tahoma, Verdana, Arial, sans-serif;
}
.topLeft {
    float: left;
    width: calc( 65% - 20px );
    padding: 10px;
}
.topRight {
    border-bottom-right-radius: 10px 10px;
    background-color: white;
    float: right;
    width: calc( 35% - 20px );
    padding: 10px;
}
.message {
    color: #cd6e0f;
    padding: 5px;
    background-color: #ffffdb;
    border: 2px solid #f9eccc;
    border-radius: 10px;
}
html, body{
    font-family: "Arial", "Helvetica"
}
hr{
    margin: 5px 0px; 
    border-style: dotted;
    border-width: 0.5px;
    border-color: #aaa;
}
.topRight .message{
    padding: 15px 20px;
    color: #000;
    font-size: 14px;
    border: 1px solid #ffeecc;
}
.topRight .message small h3{
    font-size: 17px;
    margin-top: 0px;
    color: #cc6600;
    margin-bottom: 5px;
}

video{
    border: 1px solid #fff;
    outline: 1px solid #999;
    background: #000;
    width: 120px;
    height: 72px;
}
.videothumbnails .video small a{
    font-size: 16px;
    text-decoration: none;
    font-weight: bold;
    position: absolute;
    margin: 0px 10px;
    max-width: 200px;
    text-overflow: ellipsis;
}
.videothumbnails .video span{
    color: #666;
    font-size: 11px!important;
    text-overflow: ellipsis;
    min-width: 100px;
    max-width: 100px;
    max-height: 3.2em;
    min-height: 3.2em;
    word-break: keep-all;
    white-space: nowrap;
    overflow: hidden;
    margin: 0px!important;
}
.videothumbnails .video span span{
    color: #000;
}
a{
    color: #0022cc;
}
.topLeft h2{
    font-size: 18px;
}
.header{
    border-radius: 10px 10px 0 0;
    background: linear-gradient(#bbb, #ddd);
    display: flex;
    padding: 10px;
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
fieldset{
    background: #fff;
    border: 1px solid #ccc;
}
fieldset legend{
    font-weight: bold;
}
.flexBoxThing {
    display: flex;
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