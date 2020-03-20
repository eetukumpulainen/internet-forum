<?php
// TODO Session

// Connecting to mysql database
$db = new mysqli("localhost", "root", "", "users") or die("Unable to connect to database");
echo "Database connected<br>";
// Displaying today's date
echo "Today's date is: " . date("d.m.Y") . "<br>";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM user WHERE (email='$email' AND password='$password')";

	$result = $db->query($sql);

	if ($result->fetch_assoc() != null) {
		header("location: mainPage.php");
	} else {
		echo "Wrong email or password";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
	<!--Add CSS stylesheet-->
	<link href="styleForForum.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Welcome!</h1>
<div class="bluebox"> <!-- Form for user info -->
	<h1>Please login using your existing account or sing in</h1>
	<form action="login.php" method="post">
		<input type="text" class="field" placeholder="email" name="email" required/><br>
		<input type="text" class="field" placeholder="password" name="password" required/><br>
		<input type="submit" value="Login" class="field"/><br>
	</form>
		<a href="signin.php"><button class="field">Sign in</button></a>
</div>

<!-- Some information at the bottom of the page -->
<div class="bottombox">
	<p>This page was created using HTML5, CSS, PHP and MySQL.<br></p>
</div>
</body>
</html>