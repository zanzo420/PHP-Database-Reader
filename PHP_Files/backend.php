<?php
$link = mysqli_connect('localhost','root','');
$database = mysqli_select_db($link,'mybb');

// Create connection
/*$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */

$user = $_GET['username'];

$sql = "SELECT * FROM forums_users WHERE username = '". mysqli_real_escape_string($link,$user) ."'" ;
//$sql = "SELECT * FROM forums_users";
$result = $link->query($sql);

if ($result->num_rows > 0) {
	// Outputting the rows
	while($row = $result->fetch_assoc()) {
		
		if (strpos($row['usergroup'], '7') !== FALSE)
		{
			echo "User is banned<br>";
		}
		else
		{
			if (strpos($row['usergroup'], '8') !== FALSE)
			{
				echo "User is premium<br>";
			}
			else if (strpos($row['additionalgroups'], '8') !== FALSE)
			{
				echo "User is premium<br>";
			}
			else
			{
				echo "User is not premium<br>";
			}
		}
		
		if (strpos($row['additionalgroups'], '7') !== FALSE)
		{
			echo "User is banned<br>";
		}
		else
		{

		}
	}
} 
else
{
	echo "No user with the username " . $user;
}
?>

<html>
<head>
<title>PHP account check return</title>
<meta http-equiv="refresh" content="1" />
</head>

<body>
</body>

</html>