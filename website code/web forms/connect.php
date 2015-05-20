<?php
	$user = "project_user";
	$pass = "projecT426+";

  try
  	{
    $dbh = new PDO('mysql:host=localhost;dbname=project426', $user, $pass);
	}
	catch (PDOException $e) 
	{
		print "Error! : " . $e->getMessage() . "<br />";
		die();
  	}
