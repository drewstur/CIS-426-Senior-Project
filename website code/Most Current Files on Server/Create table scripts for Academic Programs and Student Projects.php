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
    $sql = "CREATE TABLE AcademicInterest (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(40) NOT NULL,
	email VARCHAR(50),
	poInterest TEXT,
	address VARCHAR(50),
	city VARCHAR(30),
	state VARCHAR(30),
	zip INT(5),
	phone INT(10)
	)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table AcademicInterest created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE StudentProjects (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	title VARCHAR(30) NOT NULL,
	author VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	summary TEXT
	)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table StudentProjects created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
	
$conn = null;
?>