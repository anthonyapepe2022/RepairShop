<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Add a car to the Repair Shop</title>
</head>
<body>

<h3>Add a car to a customer in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
    ?>

<form id="register" name="register" method="POST" action="AddCar.php" onsubmit="return true">
Car ID: <input type="text" id="car_ID" name="car_ID"><br>
<?php

	$result=mysqli_query($db_connection, "SELECT * from Customer") or die ("Query for the drop down didn't work");

	echo "
    Customer ID:
	<select name='customer_ID' id='customer_ID'>
	<option value='---------------'>----------</option>";

	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='".$row['customer_ID']."'>".$row['fName']." ".$row['lName']."</option>";
	}

	echo"
	</select>
	<br>
	";
	?>
	
    Make: <input type="text" id="make" name="make"><br>
    Model: <input type="text" id="model" name="model"><br>
    Year: <input type="text" id="year" name="year"><br>
    
<br><br>
<input type="submit" value="Add Car">
<br><br>
</form>

<?php
$sql="INSERT INTO Automobile VALUES ('".
$_POST['car_ID']."', '".
$_POST['customer_ID']."', '".
$_POST['make']."', '".
$_POST['model']."', '".
$_POST['year']."')";

echo "The sql for the insert<br>";
echo $sql;
echo "<br><br>";

// The actual insert here
IF($_POST['customer_ID'] != "")
{
   mysqli_query($db_connection, $sql) or die("Insert did not work");
}

$carTable = mysqli_query($db_connection, "SELECT * FROM Automobile");

echo "
	<br>
	<table border='1'>
	<tr>
	<th>Car ID</th>
	<th>Customer ID</th>
	<th>Make</th>
	<th>Model</th>
	<th>Year</th>
	</tr>
	";
			
	while ($row = mysqli_fetch_array($carTable)) {
		echo "<tr>";
		echo "<td>" . $row["car_ID"] . "</td>";
		echo "<td>" . $row["customer_ID"] . "</td>";
		echo "<td>" . $row["make"] . "</td>";
		echo "<td>" . $row["model"] . "</td>";
		echo "<td>" . $row["year"] . "</td>";
		echo "</tr>";
	}
			
	echo "</table>";

?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>