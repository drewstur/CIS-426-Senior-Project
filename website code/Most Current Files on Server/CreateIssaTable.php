
<?php
$servername = "localhost";
$username = "project_user";
$password = "projecT426+";
$dbname = "project426";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE issausers (
    id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    degree text NOT NULL,
    email VARCHAR(50),
    phone varchar(20) NOT NULL,
    address varchar(40) NOT NULL,
    city text NOT NULL,
    state text NOT NULL,
    zipcode int(8) NOT NULL,
    gradstatus text NOT NULL,
    reg_date TIMESTAMP
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>