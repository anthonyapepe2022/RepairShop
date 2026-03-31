<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Show a report on the repair shop jobs</title>
</head>
<body>

<h3>Show a report on the repair shop jobs in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");

        $jobTable = mysqli_query($db_connection, "SELECT * FROM Job");
        $customerTable = mysqli_query($db_connection, "SELECT * FROM Customer");
        $repairTable = mysqli_query($db_connection, "SELECT * FROM Repair");

        echo "
	    <br>
	    <table border='1'>
	    <tr>
        <th>Job ID</th>
	    <th>Customer First Name</th>
	    <th>Customer Last Name</th>
	    <th>Cars</th>
	    <th>Description</th>
	    <th>Date Assigned</th>
	    <th>Date Completed</th>
	    </tr>
	    ";
			
	while ($row = mysqli_fetch_array($jobTable)) {
		echo "<tr>";
		echo "<td>" . $row["job_ID"] . "</td>";
	}
    
    	while ($row = mysqli_fetch_array($customerTable)) {
        	echo "<tr>";
		echo "<td>" . $row["fName"] . "</td>";
		echo "<td>" . $row["lName"] . "</td>";
	}

    while ($row = mysqli_fetch_array($jobTable)) {
        echo "<tr>";
		echo "<td>" . $row["car_ID"] . "</td>";
        echo "</tr>";
	}

    while ($row = mysqli_fetch_array($repairTable)) {
        echo "<tr>";
		echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
	}

    while ($row = mysqli_fetch_array($jobTable)) {
        echo "<tr>";
		echo "<td>" . $row["date"] . "</td>";
		echo "<td>" . $row["date_Completed"] . "</td>";
        echo "</tr>";
	}
			
	echo "</table>";
    ?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>