<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Add parts to the Repair Shop</title>
</head>
<body>

<h3>Add parts to the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
    ?>
	<form id="register" name="register" method="POST" action="AddParts.php" onsubmit="return true">
    Part ID: <input type="text" id="part_ID" name="part_ID"><br>
    Repair ID: <input type="text" id="repair_ID" name="repair_ID"><br>
	<br><br>
    <input type="submit" value="Add Part">
    <br><br>
    </form>

	<?php

	$sql="INSERT INTO Part_Repair VALUES ('".
	$_POST['part_ID']."', '".
	$_POST['repair_ID']."')";

	echo "The sql for the insert<br>";
	echo $sql;
	echo "<br><br>";

	// The actual insert here
	IF($_POST['repair_ID'] != "")
	{
		mysqli_query($db_connection, $sql) or die("Insert did not work");
	}

	$partTable = mysqli_query($db_connection, "SELECT * FROM Part_Repair");

	echo "
	<br>
	<table border='1'>
	<tr>
	<th>Part ID</th>
	<th>Repair ID</th>
	</tr>
	";
		
	while ($row = mysqli_fetch_array($partTable)) {
		echo "<tr>";
		echo "<td>" . $row["part_ID"] . "</td>";
		echo "<td>" . $row["repair_ID"] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>";

?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>