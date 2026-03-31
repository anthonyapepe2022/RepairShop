<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Add an estimate to the Repair Shop</title>
</head>
<body>

<h3>Add an estimate to a car in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
    ?>

<form id="register" name="register" method="POST" action="AddEstimate.php" onsubmit="return true">
Estimate ID: <input type="text" id="estimate_ID" name="estimate_ID"><br>
Mechanic ID: <input type="text" id="mechanic_ID" name="mechanic_ID"><br>
<?php

	$result=mysqli_query($db_connection, "SELECT * from Automobile") or die ("Query for the drop down didn't work");

	echo "
    Car ID:
	<select name='car_ID' id='car_ID'>
	<option value='---------------'>----------</option>";

	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='".$row['car_ID']."'>".$row['year']." ".$row['make']." ".$row['model']."</option>";
	}

	echo"
	</select>
	<br>
	";
	?>
	
    Estimated Cost: <input type="text" id="est_cost" name="est_cost"><br>
    Date: <input type="date" id="date" name="date"><br>
    
<br><br>
<input type="submit" value="Add Estimate">
<br><br>
</form>

<?php
$sql="INSERT INTO Estimate VALUES ('".
$_POST['estimate_ID']."', '".
$_POST['mechanic_ID']."', '".
$_POST['car_ID']."', '".
$_POST['est_cost']."', '".
$_POST['date']."')";

echo "The sql for the insert<br>";
echo $sql;
echo "<br><br>";

// The actual insert here
IF($_POST['mechanic_ID'] != "")
{
   mysqli_query($db_connection, $sql) or die("Insert did not work");
}

$estimateTable = mysqli_query($db_connection, "SELECT * FROM Estimate");

echo "
	<br>
	<table border='1'>
	<tr>
	<th>Estimate ID</th>
	<th>Mechanic ID</th>
	<th>Car_ID</th>
	<th>Estimated Cost</th>
	<th>Date</th>
	</tr>
	";
			
	while ($row = mysqli_fetch_array($estimateTable)) {
		echo "<tr>";
		echo "<td>" . $row["estimate_ID"] . "</td>";
		echo "<td>" . $row["mechanic_ID"] . "</td>";
		echo "<td>" . $row["car_ID"] . "</td>";
		echo "<td>" . $row["est_cost"] . "</td>";
		echo "<td>" . $row["date"] . "</td>";
		echo "</tr>";
	}
			
	echo "</table>";

?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>