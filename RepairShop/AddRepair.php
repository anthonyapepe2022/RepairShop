<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Adds repair(s) to a job</title>
</head>
<body>

<h3>Adds repair(s) to a job in the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
	?>

    <form id="register" name="register" method="POST" action="AddRepair.php" onsubmit="return true">
	Repair ID: <input type="text" id="repair_ID" name="repair_ID"><br>
    <?php
        $result=mysqli_query($db_connection, "SELECT * from Repair") or die ("Query for the drop down didn't work");

        echo"
        <br>Select a repair description:
        <select name='description' id='description'>
        <option value='---------------'>----------</option>";

        while($row=mysqli_fetch_array($result))
        {
	        echo "<option value='".$row['repair_ID']."'>".$row['description']." </option>";
        }

        echo"
        </select>
        <br>
        ";

    ?>
Time Required: <input type="text" id="time_required" name="time_required"><br>
Cost: <input type="text" id="cost" name="cost"><br>

<br><br>
<input type="submit" value="Add Repair">
<br><br>
</form>

    <?php

    $sql="INSERT INTO Repair_Job VALUES ('".
    $_POST['repair_ID']."') ";

    echo "The sql for the insert<br>";
	echo $sql;
	echo "<br><br>";

	// The actual insert here
	IF($_POST['repair_ID'] != "")
	{
		mysqli_query($db_connection, $sql) or die("Insert did not work");
	}

    $repairJobTable = mysqli_query($db_connection, "SELECT * FROM Repair_Job");

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