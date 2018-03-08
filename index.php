<?php
	$server = "sql2.njit.edu";
	$username = "agl24";
	$password = "tb6BD9iC";

	$dsn = "mysql:host=$server;dbname=$username";

	try
	{
	    $conn = new PDO($dsn, $username, $password);
	    echo "Connected successfully<br>";
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}

	$nRows = $conn->query("SELECT count(*) FROM `accounts` WHERE id < 6")->fetchColumn(); 
	echo $nRows." rows selected.";

	$myQuery = $conn -> query("SELECT * FROM `accounts` WHERE id < 6");

	echo "<table><tr><th>ID</th><th>E-Mail</th></tr>";
	while($row = $myQuery->fetch())
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "</tr>";
	}
	echo "</table>";

?>