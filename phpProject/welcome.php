<?php
// Connecting to mysql database
$db = new mysqli("localhost", "root", "", "users") or die("Unable to connect to database");
echo "Database connected<br>";
// Displaying today's date
echo "Today's date is: " . date("d.m.Y") . "<br>";
?>

<!DOCTYPE html>

<html>
<head>
    <title>You are in!</title>
    <link href="myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Registration complete!</h1>

<div class="user_info">
	<h1>Users registered:</h1>
	<p>Here is a list of all users that have registered to this site<br>
	(Name, age, date of registration)</p>
	<?php
	$sql = "SELECT * FROM user"; // Ask fo every user in database
	$result = $db -> query($sql);
	while($row = $result->fetch_assoc()) { // $row is 1 item from table
		echo "<div class='user'><span>$row[name]<br> <a href=mailto: $row[email]>$row[email]</a><br> $row[age]<br> $row[registered]</span></div>";
	}
	?>
</div>

</body>
</html>