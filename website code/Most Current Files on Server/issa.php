<?php
//conneting to databse
require("connect.php");
//preparing sql statement for data entry
$sql = "INSERT INTO issausers(
			firstname,
            lastname,
            degree,
            email,
            phone,
            address,
            city,
            state,
            zipcode,
            gradstatus) VALUES (
            :firstname, 
            :lastname, 
            :degree, 
            :email, 
            :phone,
            :address,
            :city,
            :state,
            :zipcode,
            :gradstatus)";  
//preparing pdo stmt using the sql statement above
$stmt = $dbh->prepare($sql);       
//binding data to stmt then excuting it                                    
$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);       
$stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR); 
$stmt->bindParam(':degree', $_POST['degree'], PDO::PARAM_STR);
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
$stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
$stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
$stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR);    
$stmt->bindParam(':state', $_POST['state'], PDO::PARAM_STR); 
$stmt->bindParam(':zipcode', $_POST['zipcode'], PDO::PARAM_STR); 
$stmt->bindParam(':gradstatus', $_POST['gradstatus'], PDO::PARAM_STR);                                       
$stmt->execute();  
?>

<html>
<head></head>
<body>
<h3>Join ISSA club today!</h3>
<form action="issa.php" method="post">
 			Name:
			<input type="text" name="firstname" size="20" /><br/>

			Last name:
			<input type="text" name="lastname" size="20" /><br/>

			Degree:
			<select name="degree">
				<option value="accounting">Accounting</option>
				<option value="business">Business</option>
			  	<option value="management">Management</option>
			  	<option value="informationsystems">Computer Information Systems</option>
			 </select><br/>
   
			Contact email address:
			<input type="text" name="email" size="30" /><br/>

		 	Telephone:
  			<input type="phone" name="phone"><br/>    

			Address:
			<input type="text" name="address" size="30" /><br/>

			City:
			<input type="text" name="city" size="20" /><br/>

			State:
			<select name="state" />
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
			</select><br />

			Zipcode:
			<input type="text" name="zipcode" value="" pattern="\d*" size="10"><br />
	
			<input type="radio" name="gradstatus" value="undergrad" CHECKED>UnderGrad
			<input type="radio" name="gradstatus" value="graduate">Graduate
			<br />


			<input type="submit" value="Register" />
</form>
</body>
</html>
