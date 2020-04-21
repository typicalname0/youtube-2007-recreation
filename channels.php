<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="global.css">
	<link rel="stylesheet" type="text/css" href="channels.css">
</head>
<body>
	<?php include "header.php"; ?>
		<div class="container-flex">
	    <div class="col-2-3">
			<?php
			$statement = $mysqli->prepare("SELECT * FROM users ORDER BY subscribers DESC");
			$statement->execute();
			$result = $statement->get_result();
			if($result->num_rows !== 0){
				while($row = $result->fetch_assoc()) {
				    echo "
				    <div class='user container-flex'>
					    <div class='col-2-3'><a href='profile.php?id=".$row["id"]."'><img class='user-picture' src='pfp/".$row['pfp']."'></a></div>
					    <div class='user-info col-1-3'>
						    <div><a href='profile.php?id=".$row['id']."'>".$row['username']."</a></div>
						    <div><span class='number'>".$row['subscribers']."</span> subscribers</div>
					    </div>
				    </div>
				    <hr>";
				}
			}
			else{
				echo "There are no channels here. Why don't you make one?";
			}
			$statement->close();
			?>
	    </div>


	<div class="col-1-3">
	    <div class="card message">
	    Viewing channels is still buggy. Report bugs to the owner.
	    </div>
	</div>
	</div>
</body>