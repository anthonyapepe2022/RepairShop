<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Displays all of the tables</title>
</head>
<body>

<h3>Displays all of the tables in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
        
        $carTable = mysqli_query($db_connection, "SELECT * FROM Automobile");
        $customerTable = mysqli_query($db_connection, "SELECT * FROM Customer");
        $estimateTable = mysqli_query($db_connection, "SELECT * FROM Estimate");
        $jobTable = mysqli_query($db_connection, "SELECT * FROM Job");
        $logTable = mysqli_query($db_connection, "SELECT * FROM Log");
	$mechanicTable = mysqli_query($db_connection, "SELECT * FROM Mechanic");
        $partRepairTable = mysqli_query($db_connection, "SELECT * FROM Part_Repair");
        $repairTable = mysqli_query($db_connection, "SELECT * FROM Repair");
        $repairJobTable = mysqli_query($db_connection, "SELECT * FROM Repair_Job");

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

		echo "<br><br><br>";

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

		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Estimate ID</th>
	    <th>Mechanic ID</th>
	    <th>Car ID</th>
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

		echo "<br><br><br>";

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

		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Log ID</th>
	    <th>Record Changed</th>
	    <th>Action</th>
	    <th>Change Date</th>
	    </tr>
	    ";
			
	    while ($row = mysqli_fetch_array($logTable)) {
		    echo "<tr>";
		    echo "<td>" . $row["Log_ID"] . "</td>";
		    echo "<td>" . $row["Rec_Changed"] . "</td>";
		    echo "<td>" . $row["Action"] . "</td>";
		    echo "<td>" . $row["Change_Date"] . "</td>";
		    echo "</tr>";
	    }
			
	    echo "</table>";

		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Mechanic ID</th>
	    <th>Name</th>
	    <th>Rate</th>
	    <th>Number of Jobs Assigned</th>
	    </tr>
	    ";
			
	    while ($row = mysqli_fetch_array($mechanicTable)) {
		    echo "<tr>";
		    echo "<td>" . $row["mechanic_ID"] . "</td>";
		    echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["rate"] . "</td>";
			echo "<td>" . $row["Num_of_Jobs_Assigned"] . "</td>";
		    echo "</tr>";
	    }
			
	    echo "</table>";
		
		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Part ID</th>
	    <th>Repair ID</th>
	    </tr>
	    ";
			
		while ($row = mysqli_fetch_array($partRepairTable)) {
		    echo "<tr>";
		    echo "<td>" . $row["part_ID"] . "</td>";
		    echo "<td>" . $row["repair_ID"] . "</td>";
		    echo "</tr>";
	    }
			
	    echo "</table>";

		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Repair ID</th>
	    <th>Description</th>
		<th>Time Required</th>
		<th>Cost</th>
	    </tr>
	    ";
			
		while ($row = mysqli_fetch_array($repairTable)) {
		    echo "<tr>";
		    echo "<td>" . $row["repair_ID"] . "</td>";
		    echo "<td>" . $row["description"] . "</td>";
		    echo "<td>" . $row["time_required"] . "</td>";
			echo "<td>" . $row["cost"] . "</td>";
			echo "</tr>";
	    }
			
	    echo "</table>";

		echo "<br><br><br>";

		echo "
	    
        <br>
	    <table border='1'>
	    <tr>
	    <th>Repair ID</th>
	    <th>Job ID</th>
	    </tr>
	    ";
			
		while ($row = mysqli_fetch_array($repairJobTable)) {
		    echo "<tr>";
		    echo "<td>" . $row["repair_ID"] . "</td>";
		    echo "<td>" . $row["job_ID"] . "</td>";
			echo "</tr>";
	    }
			
	    echo "</table>";
        ?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>