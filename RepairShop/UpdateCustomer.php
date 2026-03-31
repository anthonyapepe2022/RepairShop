<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Update a customer in the customer table</title>
</head>
<body>

<h3>Update a customer in the Automobile Body Repair Shop Project</h3>
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
<br>Select a Customer to update:
<select name='customer_ID' id='customer_ID'>
<option value='---------------'>----------</option>";

while($row=mysqli_fetch_array($result))
{
	echo "<option value='".$row['customer_ID']."'>".$row['fName']." ".$row['lName']."</option>";
}

echo"
</select>
<br><br>
<input type='submit' value='Get the customer Information'>
</form>
";

?>

<br><br>
<?php
    $sql="SELECT * from Customer WHERE customer_ID='".$_POST["customer_ID"]."'";
    echo $sql;
    echo "<br><br>";
    $result=mysqli_query($db_connection, $sql) or die("Query to get the info didn't work");
    $row=mysqli_fetch_array($result);

    echo "
    <form id='update' name='update' method='POST' action='UpdateCustomer.php'>
    Customer ID: <input type='text' id='customer_ID' name='customer_ID' value='".$row['customer_ID']."'><br>
    First Name: <input type='text' id='fName' name='fName' value='".$row['fName']."'><br>
    Last Name: <input type='text' id='lName' name='lName' value='".$row['lName']."'><br>
    Address: <input type='text' id='addr' name='addr' value='".$row['addr']."'><br>
	Phone Number: <input type='text' id='phone' name='phone' value='".$row['phone']."'><br>
    
<br><br>
<input type='submit' value='Update Customer'>
</form>
<br><br>";

?>

<?php
$sql="UPDATE Customer SET
fName = '".$_POST['fName']."',
lName = '".$_POST['lName']."',
addr = '".$_POST['addr']."',
phone = '".$_POST['phone']."'
WHERE customer_ID='".$_POST['customer_ID']."';"
;

echo "The sql for the insert<br>";
echo $sql;
echo "<br><br>";

// The actual running of the update query
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