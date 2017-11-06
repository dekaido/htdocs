<html>
<body>
<?php

$first = $_POST["firstName"];
$last = $_POST["lastName"];
$id = $_POST["id"];

echo "<h2>Welcome,</h2> " . $first . " " . $last . "!<br><br>";
echo "Student ID: " . $id . "<br>";

$server = "localhost";
$username = "root";
$password = "";
$database = "orgs";

$connect = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_error())
{
	die("Connection failed: " . mysqli_connect_error());	
}

$cmd1 ="SELECT major,gpa,credits FROM starfish WHERE id = $id ORDER BY credits DESC;";
$cmd2 = "INSERT INTO user (id,firstName,lastName) VALUES ('$id','$first','$last')";

$res1 = mysqli_query($connect,$cmd1);

if(mysqli_num_rows($res1) > 0)
{
	$row = mysqli_fetch_assoc($res1);
	$sem = mysqli_num_rows($res1);
	echo "Semester: " . ceil($sem) . "  ";# . "<br>";
	vprintf("Major: %s  ",array($row["major"]));
	vprintf("GPA: %.2f  ",array($row["gpa"]));
	vprintf("Credits: %.2f  ",array($row["credits"]));
	echo "<br><br><br>";
	echo "*GPA of prior semester.<br>**Credits accumulated.<br>";
}
else
{
	echo "0 results.";
}

$res2 = mysqli_query($connect,$cmd2);
if(!$res2) echo mysqli_error($connect);

mysqli_close($connect);

?>

</body>
</html>