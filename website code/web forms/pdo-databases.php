<?php
	$user = "widget_cms";
	$pass = "widgetp@ssw0rd";

  try {
    $dbh = new PDO('mysql:host=localhost;dbname=widget_corp', $user, $pass);
	foreach($dbh->query('SELECT * FROM subjects') as $row) {
		print_r($row);
		print "<br />";
		}
		$dbh = null;
	} catch (PDOException $e) {
		print "Error! : " . $e->getMessage() . "<br />";
		die();
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
  
<html lang="en">
  <head>
    <title>Databases</title>
  </head>
  <body>
	<br />Done.
  </body>
</html>  


	