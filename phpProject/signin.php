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
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
	$date = date("d.m.Y");

	$command = "INSERT INTO user (name, email, password, registered)
	VALUES ('$name', '$email', '$password', '$date')";

	if ($db->query($command) === TRUE) {
		echo "New record created successfully";
		header("location: mainPage.php");
	} else {
    	echo "Error: " . $command . "<br>" . $db->error;
	}
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sign in</title>
        <link href="styleForForum.css" rel="stylesheet" type="text/css">
</head>

    <body>
        <h1>Please enter your info and sign in</h1>

        <div class="bluebox">

        <form action="signin.php" method="post">
            <input type="text" class="field" placeholder="username" name="name" required/><br>
            <input type="text" class="field" placeholder="email" name="email" required/><br>
            <input type="text" class="field" placeholder="password" name="password" required/><br>
            <input type="text" class="field" placeholder="confirm password" name="confirmpassword" required/><br>
            <input type="submit" class="field" value="Submit"/>
        </form>
            <a href="phpScript.php"><button class="field">Back</button></a>

</div>

        <!-- Some information at the bottom of the page -->
        <div class="bottombox">
	        <p>This page was created using HTML5, CSS, PHP and MySQL.<br></p>
</div>

</body>
</html>