<?php
	$user = "";
	$pass = "";

  try
  	{
    $dbh = new PDO('mysql:host=localhost;dbname=project426', $user, $pass);
	}
	catch (PDOException $e) 
	{
		print "Error! : " . $e->getMessage() . "<br />";
		die();
  	}
