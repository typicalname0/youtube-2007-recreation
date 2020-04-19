<?php
include("header.php");
?>
<div class="flexBoxThing">
    <div class="topLeft">
<?php
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->bind_param("s", $_POST['fr']);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');
while($row = $result->fetch_assoc()) {
    echo "<small><span style='float: right;'><a href='profile.php?id=" . $row['id'] . "'>" . $row['username'] . "</a></span><br>";
    echo "<span style='float: right;'>" . $row['subscribers'] . " subscribers</span></small>";
    echo "<img style='width:100px;' src='pfp/" . $row['pfp'] . "'>";
    echo "<hr>";
}
$stmt->close();
?>
    </div>


<div class="topRight">
    <div class="message">
    Viewing channels is still buggy. Report bugs to the owner.
    </div>
</div>
</div>