<?php
// Connecting to mysql database
$db = new mysqli("localhost", "root", "", "users") or die("Unable to connect to database");
echo "Database connected<br>";
// Displaying today's date
echo "Today's date is: " . date("d.m.Y") . "<br>";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	echo "Method is POST<br>";
	$name = $_POST["name"];
	$email = $_POST["email"];
	$age = $_POST["age"];
	$date = date("d.m.Y");

	$command = "INSERT INTO user (name, email, age, registered)
	VALUES ('$name', '$email', '$age', '$date')";

	if ($db->query($command) === TRUE) {
		echo "New record created successfully";
		header("location: welcome.php");
	} else {
    	echo "Error: " . $command . "<br>" . $db->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
	<!--Add CSS stylesheet-->
	<link href="myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Welcome!</h1>
<div class="module"> <!-- Form for user info -->
	<h1>Who are you?</h1>
	<form action="phpScript.php" method="post">
		<input type="text" class="field" placeholder="Your name" name="name" required/><br>
		<input type="text" class="field" placeholder="Your email" name="email" required/><br>
		<input type="number" class="field" placeholder="Your age" name="age" required/><br>
		<input type="submit" value="Register" class="field"/>
		<input type="reset" value="Clear" class="field"/>
	</form>
</div>

<!-- Some information at the bottom of the page -->
<div class="bottombox">
	<p>This page was created using PHP and MySQL.<br></p>
</div>
</body>
</html>