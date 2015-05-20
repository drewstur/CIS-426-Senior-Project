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
$titleErr = $authorErr = $emailErr = "";
$title = $author = $email = $summary = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["title"])) {
     $titleErr = "Title is required";
   } else {
     $title = test_input($_POST["title"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
       $titleErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["author"])) {
     $authorErr = "Title is required";
   } else {
     $author = test_input($_POST["author"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$author)) {
       $authorErr = "Only letters and white space allowed"; 
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
     
   if (empty($_POST["summary"])) {
     $summary = "";
   } else {
     $summary = test_input($_POST["summary"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Student Projects Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Project Title: <input type="text" name="title" value="<?php echo $title;?>">
   <span class="error"><?php echo $titleErr;?></span>
   <br><br>
   Author: <input type="text" name="author" value="<?php echo $author;?>">
   <span class="error"><?php echo $authorErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error"><?php echo $emailErr;?></span>
   <br><br>
   Project Summary: <textarea name="summary" rows="5" cols="40"><?php echo $summary;?></textarea>
   <br><br>
   <input type="submit" name="submit" value="Submit">  <input type="reset"  name="reset" value="Clear"  onclick="window.location = 'studentprojects.php';">
</form>

<?php
if  (isset($_POST['submit']) && $titleErr == FALSE && $authorErr == FALSE && $emailErr == FALSE)
{
require("connect.php");
$sql = "INSERT INTO studentprojects(
	    title,
            author,
            email,
            summary
            ) VALUES (
            :title, 
            :author, 
            :email, 
            :summary)";
                                          
$stmt = $dbh->prepare($sql);                                              
$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);       
$stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR); 
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
$stmt->bindParam(':summary', $_POST['summary'], PDO::PARAM_STR);                                   
$stmt->execute(); 
}
?>



</body>
</html>