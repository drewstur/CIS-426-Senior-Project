<?php
$servername = "localhost";
$username = "project_user";
$password = "projecT426+";
$dbname = "project426";

try {
    $conn = new PDO("mysql:host=$servername;dbname=project426", $username, $password);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
	
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "DROP TABLE studentprojects";
	$conn->exec($sql);
    echo "Table studentprojects deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
$conn = null;
?>