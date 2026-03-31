<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-epuiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Add a mechanic to the Repair Shop</title>
</head>
<body>

<h3>Add a mechanic to the Automobile Body Repair Shop Project</h3>
    <?php
		$db_location = "localhost";
		$db_username = "a930919p";
		$db_password = "P@tchouli1";
		$db_database = "a930919p_RepairShop";
		
		$db_connection = mysqli_connect($db_location, $db_username, $db_password, $db_database) or die("Could not connect to the database.");
    ?>

    <form id="register" name="register" method="POST" action="AddMechanic.php" onsubmit="return true">
    Mechanic ID: <input type="text" id="mechanic_ID" name="mechanic_ID"><br>
    Name: <input type="text" id="name" name="name"><br>
    Rate: <input type="text" id="rate" name="rate"><br>

    <br><br>
    <input type="submit" value="Add Mechanic">
    <br><br>
    </form>

    <?php

    $sql="INSERT INTO Mechanic VALUES ('".
    $_POST['mechanic_ID']."', '".
    $_POST['name']."', '".
    $_POST['rate']."', '".
    '0'."')";

    echo "The sql for the insert<br>";
    echo $sql;
    echo "<br><br>";

    // The actual insert here
    IF($_POST['name'] != "")
    {
        mysqli_query($db_connection, $sql) or die("Insert did not work");
    }

    $mechanicTable = mysqli_query($db_connection, "SELECT * FROM Mechanic");

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

?>

<br><br>
<a href="https://csdb01.cs.edinboro.edu/~a930919p/RepairShop/RepairShop.html">Back to the Repair Shop main menu</a>

</body>
</html>