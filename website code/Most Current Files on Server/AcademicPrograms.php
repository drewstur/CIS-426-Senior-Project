<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $poInterestErr = $addressErr = $cityErr = $stateErr = $zipErr = $phoneErr = "";
$fname = $lname = $email = $poInterest = $address = $city = $state = $zip = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
     $nameErr = "Name is required";
    } else {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["lname"])) {
     $nameErr = "Name is required";
   } else {
     $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
	if (empty($_POST["email"])) {
     $emailErr = "Email is required";
	} else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
	}
     
	if (empty($_POST["poInterest"])) {
     $poInterestErr = "Program of Interest required";
	} else {
     $poInterest = test_input($_POST["poInterest"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$poInterest)) {
		$poInterestErr = "Only letters and white space allowed"; 
     }
	}
	
	if (empty($_POST["address"])) {
     $addressErr = "Address required";
	} else {
     $address = test_input($_POST["address"]);
     // check if name only contains letters numbers and whitespace
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$address)) {
		$addressErr = "Only letters, numbers, and white space allowed"; 
     }
	}
	
	if (empty($_POST["city"])) {
     $cityErr = "City required";
	} else {
     $city = test_input($_POST["city"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
		$cityErr = "Only letters and white space allowed"; 
     }
	}
	
	if (empty($_POST["state"])) {
     $stateErr = "State required";
	} 
}

if (empty($_POST["zip"])) {
     $zipErr = "Zip code required";
	} else {
     $zip = test_input($_POST["zip"]);
     // check if zip only contains numbers
     if (!preg_match("/^[0-9]*$/",$zip)) {
		$zipErr = "Only numbers allowed"; 
     }
	}

if (empty($_POST["phone"])) {
     $phoneErr = "Phone number required";
	} else {
     $phone = test_input($_POST["phone"]);
     // check if number is only numbers
     if (!preg_match("/^[0-9]*$/",$phone)) {
		$phoneErr = "Only numbers allowed"; 
     }
	}	
	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Academic Interest Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
   <span class="error"><?php echo $nameErr;?></span>
   <br><br>
   Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
   <span class="error"><?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error"><?php echo $emailErr;?></span>
   <br><br>
   Program of Interest: <input type="text" name="poInterest" value="<?php echo $poInterest;?>">
   <span class="error"><?php echo $poInterestErr;?></span>
   <br><br>
	Address: <input type="text" name="address" value="<?php echo $address;?>">
   <span class="error"><?php echo $addressErr;?></span>
   <br><br>
   City: <input type="text" name="city" value="<?php echo $city;?>">
   <span class="error"><?php echo $cityErr;?></span>
   <br><br>
   State: <select id="state" name="state" onchange="run()">  
            <option value="alabama">Alabama</option>
            <option value="alaska">Alaska</option>
            <option value="arizona">Arizona</option>
            <option value="arkansas">Arkansas</option>
			<option value="california">California</option>
            <option value="colorado">Colorado</option>
            <option value="connecticut">Connecticut</option>
            <option value="delaware">Delaware</option> 
			<option value="florida">Florida</option>
            <option value="georgia">Georgia</option>
            <option value="hawaii">Hawaii</option>
            <option value="idaho">Idaho</option>
			<option value="illinois">Illinois</option>
            <option value="indiana">Indiana </option>
            <option value="iowa">Iowa</option>
            <option value="kansas">Kansas</option>
			<option value="kentucky">Kentucky</option>
            <option value="louisiana ">Louisiana</option>
            <option value="maine ">Maine</option>
            <option value="maryland">Maryland</option>
			<option value="massachusetts ">Massachusetts</option>
            <option value="michigan">Michigan</option>
            <option value="minnesota">Minnesota</option>
            <option value="mississippi">Mississippi</option> 
			<option value="missouri">Missouri</option>
            <option value="montana">Montana</option>
            <option value="nebraska">Nebraska</option>
            <option value="nevada">Nevada</option>
			<option value="newhampshire">New Hampshire</option>
            <option value="newjersey">New Jersey </option>
            <option value="newmexico">New Mexico</option>
            <option value="newyork">New York</option>
			<option value="northcarolina">North Carolina</option>
            <option value="northdakota">North Dakota</option>
            <option value="ohio">Ohio</option>
            <option value="oklahoma">Oklahoma</option>
			<option value="oregon">Oregon</option>
            <option value="pennsylvania">Pennsylvania</option>
            <option value="rhodeisland">Rhode Island</option>
            <option value="southcarolina">South Carolina</option> 
			<option value="southdakota">South Dakota</option>
            <option value="tennessee">Tennessee</option>
            <option value="texas">Texas</option>
            <option value="utah">Utah</option>
			<option value="vermont">Vermont</option>
            <option value="virginia">Virginia </option>
            <option value="washington">Washington</option>
            <option value="westvirginia">West Virginia</option>
			<option value="wisconsin">Wisconsin</option>
        </select>
   <span class="error"><?php echo $stateErr;?></span>
   <br><br>
   Zip: <input type="text" name="zip" value="<?php echo $zip;?>">
    <span class="error"><?php echo $zipErr;?></span>
   <br><br>
   Phone Number: <input type="text" name="phone" value="<?php echo $phone;?>">
   <span class="error"><?php echo $phoneErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> <input type="reset"  name="reset" value="Clear" onclick="window.location = 'AcademicPrograms.php';">
</form>


<?php
if  (isset($_POST['submit']) && $nameErr == FALSE && $emailErr == FALSE && $poInterestErr == FALSE
		&& $addressErr == FALSE && $cityErr == FALSE && $stateErr == FALSE && $zipErr == FALSE && 
			$phoneErr == FALSE)
{
require("connect.php");
$sql = "INSERT INTO AcademicInterest(
	    fname,
            lname,
            email,
            poInterest,
			address,
			city,
			state,
			zip,
			phone
            ) VALUES (
            :fname, 
            :lname, 
            :email, 
            :poInterest,
			:address,
			:city,
			:state,
			:zip,
			:phone)";
                                          
$stmt = $dbh->prepare($sql);                                              
$stmt->bindParam(':fname', $_POST['fname'], PDO::PARAM_STR);       
$stmt->bindParam(':lname', $_POST['lname'], PDO::PARAM_STR); 
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
$stmt->bindParam(':poInterest', $_POST['poInterest'], PDO::PARAM_STR);          
$stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR); 
$stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR);  
$stmt->bindParam(':state', $_POST['state'], PDO::PARAM_STR);  
$stmt->bindParam(':zip', $_POST['zip'], PDO::PARAM_STR);      
$stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);                                       
$stmt->execute(); 
}
?>

</body>
</html>