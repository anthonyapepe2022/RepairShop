<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Adds a job</title>
</head>
<body>

<h3>Adds a job in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
	?>

	<form id="register" name="register" method="POST" action="JobPageToAddRepairs.php" onsubmit="return true">
	Job ID: <input type="text" id="job_ID" name="job_ID"><br>
	<?php
	/** Make a drop down to show all the customers **/
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
	<br>Select a Car:
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

	<?php
	$result=mysqli_query($db_connection, "SELECT * from Mechanic WHERE mechanic_ID='".$_POST["mechanic_ID"]."'") or die ("Query for the drop down didn't work");
	echo"
	<br>Select a Mechanic:
	<select name='mechanic_ID' id='mechanic_ID'>
	<option value='---------------'>----------</option>";

	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='".$row['mechanic_ID']."'> ".$row['name']. "</option>";
	}

	echo"
	</select>
	<br><br>
	<input type='submit' value='Get the job Information'>
	</form>
	";

	?>
	Estimate ID: <input type="text" id="estimate_ID" name="estimate_ID"><br>
	Date: <input type="date" id="date" name="date"><br>
	(Expected) Date Completed: <input type="date" id="date" name="date"><br>

	<br><br>
    <input type="submit" value="Add Job">
    <br><br>
    </form>

    <?php
	$sql="INSERT INTO Job VALUES ('".
	$_POST['job_ID']."', '".
	$_POST['car_ID']."', '".
	$_POST['mechanic_ID']."', '".
	$_POST['estimate']."', '".
	$_POST['date']."', '".
	$_POST['date_Completed']."')";
	
	echo "The sql for the insert<br>";
	echo $sql;
	echo "<br><br>";
	
	// The actual insert here
	IF($_POST['car_ID'] != "")
	{
	   mysqli_query($db_connection, $sql) or die("Insert did not work");
	}

	$jobTable = mysqli_query($db_connection, "SELECT * FROM Job");

	echo "
	    
	<br>
	<table border='1'>
	<tr>
	<th>Job ID</th>
	<th>Car ID</th>
	<th>Mechanic ID</th>
	<th>Estimate ID </th>
	<th>Date</th>
	<th>Date Completed</th>
	</tr>
	";
		
	while ($row = mysqli_fetch_array($jobTable)) {
		echo "<tr>";
		echo "<td>" . $row["job_ID"] . "</td>";
		echo "<td>" . $row["car_ID"] . "</td>";
		echo "<td>" . $row["mechanic_ID"] . "</td>";
		echo "<td>" . $row["estimate_ID"] . "</td>";
		echo "<td>" . $row["date"] . "</td>";
		echo "<td>" . $row["date_Completed"] . "</td>";
		echo "</tr>";
	}
		
	echo "</table>";
	?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/AddRepair.php">Page to add the repair itself</a>
<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>