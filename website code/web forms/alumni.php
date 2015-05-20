<?php
require("connect.php");
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
                                          
$stmt = $dbh->prepare($sql);                                              
$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);       
$stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR); 
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
$stmt->bindParam(':year', $_POST['year'], PDO::PARAM_STR); 
$stmt->bindParam(':degree', $_POST['degree'], PDO::PARAM_STR);                                       
$stmt->execute(); 
?>

<html>
<head></head>
<body>
<h3>College of Business Alumni Register</h3>
<form action="alumni.php" method="post">
<table>
	<tr>
		<td>
			First name:<br/>
			<input type="text" name="firstname" size="25" />
		</td>
		<td>
			Last name:<br/>
			<input type="text" name="lastname" size="25" />
		</td>
	</tr>
	<tr>
		<td>     
			Contact email address:<br />
			<input type="text" name="email" size="40" />
		</td>
		<td>     
			Year Graduated:<br />
			<input type="number" name="year" min="1950" max="2100" />
		</td>
	</tr>
	<tr>
		<td>
			Degree:<br />
			<select name="degree">
				<option value="accounting">Accounting</option>
				<option value="business">Business</option>
			  	<option value="management">Management</option>
			  	<option value="informationsystems">Computer Information Systems</option>
			 </select>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="Register" />
		</td>
	</tr>
</table>
</form>
</body>
</html>