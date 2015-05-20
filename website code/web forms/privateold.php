<?php
if(!empty($_POST))
{
$dsn = 'mysql: host=localhost; dbname=project426';
$user = 'project_user';
$password = 'projecT426+';
try {
$pdo = new PDO($dsn, $user, $password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) 
{
echo 'Connection failed: ' . $e->getMessage();
}
?>