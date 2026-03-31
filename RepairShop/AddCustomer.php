<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Add a customer to the Repair Shop</title>
</head>
<body>

<h3>Add a customer to the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
    ?>

    <form id="register" name="register" method="POST" action="AddCustomer.php" onsubmit="return true">
    Customer ID: <input type="text" id="customer_ID" name="customer_ID"><br>
    First Name: <input type="text" id="fName" name="fName" required><br>
    Last Name: <input type="text" id="lName" name="lName"><br>
    Address: <input type="text" id="addr" name="addr"><br>
    Phone Number: <input type="text" id="phone" name="phone"><br>
    
<br><br>
<input type="submit" value="Add Customer">
<br><br>
</form>

<?php
$sql="INSERT INTO Customer VALUES ('".
$_POST['customer_ID']."', '".
$_POST['fName']."', '".
$_POST['lName']."', '".
$_POST['addr']."', '".
$_POST['phone']."')";

echo "The sql for the insert<br>";
echo $sql;
echo "<br><br>";

// The actual insert here
IF($_POST['fName'] != "")
{
   mysqli_query($db_connection, $sql) or die("Insert did not work");
}

$customerTable = mysqli_query($db_connection, "SELECT * FROM Customer");

echo "
	<br>
	<table border='1'>
	<tr>
	<th>Customer ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Phone Number</th>
	</tr>
	";
			
	while ($row = mysqli_fetch_array($customerTable)) {
		echo "<tr>";
		echo "<td>" . $row["customer_ID"] . "</td>";
		echo "<td>" . $row["fName"] . "</td>";
		echo "<td>" . $row["lName"] . "</td>";
		echo "<td>" . $row["addr"] . "</td>";
		echo "<td>" . $row["phone"] . "</td>";
		echo "</tr>";
	}
			
	echo "</table>";

?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>