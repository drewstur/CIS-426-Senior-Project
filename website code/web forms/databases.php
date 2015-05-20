<?php
	//1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "widgetp@ssw0rd";
	$dbname = "widget_corp";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//Test connection
	if(mysqli_connect_errno()) {
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
		);
	}
?>

<?php
	//2. Perform query
	$query  = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";
	
	
	$result = mysqli_query($connection, $query);
	//Test for query error
	if(!$result) {
		die("Database query failed.");
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
  
<html lang="en">
  <head>
    <title>Databases</title>
  </head>
  <body>
	<ul>
	<?php
		//3. Use data
		while($subject = mysqli_fetch_assoc($result)) {
			//output data from each row
			?>
			
			<!-- echo $subject["id"]; -->
			
			<li><?php echo $subject["menu_name"] . " (" . $subject["id"] . ")"; ?></li>
			
			<!--echo $row["position"] . "<br />";
			echo $row["visible"] . "<br />";
			echo "<hr />";-->
	<?php
		}
	?>
	</ul>
<br />

	<?php 
		//4. Release data
		mysqli_free_result($result);
	?><br />
	
  </body>
</html>  

<?php
	//5. Close database connection
	mysqli_close($connection);
?>
	