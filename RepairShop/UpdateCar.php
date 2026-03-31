<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Update a car in the Repair Shop</title>
</head>
<body>

<h3>Update a car in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");


/** Make a drop down to show all the customers **/
echo "
<form id='getdata' method='POST'>";
$result=mysqli_query($db_connection, "SELECT * from Customer") or die ("Query for the drop down didn't work");


echo"
<br>Select a Customer to retrive cars:
<select name='customer_ID' id='customer_ID'>
<option value='---------------'>----------</option>";

while($row=mysqli_fetch_array($result))
{
	echo "<option value='".$row['customer_ID']."'>".$row['fName']." ".$row['lName']."</option>";
}

echo"
</select>
<br><br>
";

$result=mysqli_query($db_connection, "SELECT * from Automobile WHERE customer_ID='".$_POST["customer_ID"]."'") or die ("Query for the drop down didn't work");
echo"
<br>Select a Car to update:
<select name='car_ID' id='car_ID'>
<option value='---------------'>----------</option>";

while($row=mysqli_fetch_array($result))
{
	echo "<option value='".$row['car_ID']."'> ".$row['year']." ".$row['make']." ".$row['model']."</option>";
}

echo"
</select>
<br><br>
<input type='submit' value='Get the vehicle Information'>
</form>
";

?>

<br><br>
<?php
    $sql="SELECT * from Automobile WHERE car_ID='".$_POST["car_ID"]."'";
    echo $sql;
    echo "<br><br>";
    $result=mysqli_query($db_connection, $sql) or die("Query to get the info didn't work");
    $row=mysqli_fetch_array($result);

    echo "
    <form id='update' name='update' method='POST' action='UpdateCar.php'>
    Car ID: <input type='text' id='car_ID' name='car_ID' value='".$row['car_ID']."'><br>
    Make: <input type='text' id='make' name='make' value='".$row['make']."'><br>
    Model: <input type='text' id='model' name='model' value='".$row['model']."'><br>
    Year: <input type='text' id='year' name='year' value='".$row['year']."'><br>
    
<br><br>
<input type='submit' value='Update Car'>
</form>
<br><br>";

?>

<?php
$sql="UPDATE Automobile SET
make = '".$_POST['make']."',
model = '".$_POST['model']."',
year = '".$_POST['year']."'
WHERE car_ID='".$_POST['car_ID']."';"
;

echo "The sql for the update<br>";
echo $sql;
echo "<br><br>";

// The actual running of the update query
IF($_POST['make'] != "")
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