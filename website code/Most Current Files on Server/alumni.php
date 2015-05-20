<?php
//pulling database connection information from connect.php
require("connect.php");
//preparing sql statement format
$sql = "INSERT INTO alumni(
			firstname,
            lastname,
            email,
            yeargrad,
            degree) VALUES (
            :firstname, 
            :lastname, 
            :email, 
            :year, 
            :degree)";

//binding data to sql then exectuing input to pdo
//pdo prepare sanitizes the input stmt so no injections or malicious code can be inserted                                          
$stmt = $dbh->prepare($sql);                                              
$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);       
$stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR); 
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
$stmt->bindParam(':year', $_POST['year'], PDO::PARAM_STR); 
$stmt->bindParam(':degree', $_POST['degree'], PDO::PARAM_STR);                                       
$stmt->execute(); 
?>

<!--simple input forms for data entry -->
<html>
<head></head>
<body>
<h3>College of Business Alumni Register</h3>
<p>(Not affiliated with official Purdue alumni)</p>
<form action="alumni.php" method="post">

			First name:
			<input type="text" name="firstname" size="25" /><br />

			Last name:
			<input type="text" name="lastname" size="25" /><br />

			Contact email address:
			<input type="text" name="email" size="40" /><br />
    
			Year Graduated:
			<input type="number" name="year" min="1950" max="2100" /><br />

			Degree:
			<select name="degree">
				<option value="accounting">Accounting</option>
				<option value="business">Business</option>
			  	<option value="management">Management</option>
			  	<option value="informationsystems">Computer Information Systems</option>
			 </select><br />

			<input type="submit" value="Register" /><br />
</form>
</body>
</html>