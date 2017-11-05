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
#$cmd1 = $mysqli->prepare("SELECT * FROM starfish WHERE id = ?");
#$cmd1->bind_param('d',$id);
#$cmd1->execute();
$cmd1 ="SELECT major,gpa,credits FROM starfish WHERE id = $id ORDER BY credits DESC;";
$res1 = mysqli_query($connect,$cmd1);

#echo mysqli_num_rows($res1), " entries found.<br>";
if(mysqli_num_rows($res1) > 0)
{
	$row = mysqli_fetch_assoc($res1);
	#vprintf("ID: %7d ",array($row["id"]));
	$sem = mysqli_num_rows($res1)/2;
	echo "Semester: " . ceil($sem) . " ";# . "<br>";
	vprintf("Major: %s  ",array($row["major"]));
	vprintf("GPA: %.2f  ",array($row["gpa"]));
	vprintf("Credits: %.2f  ",array($row["credits"]));
	echo "<br><br><br>";
	echo "*GPA of prior semester.<br>**Credits accumulated.<br>";
	/*while($row = mysqli_fetch_assoc($res1))
	{		
		vprintf("ID: %7d ",array($row["id"]));
		#echo "\t";
		vprintf("MAJOR: %s  ",array($row["major"]));
		#echo "\t\t\t";
		vprintf("GPA: %.2f  ",array($row["gpa"]));
		#echo "\t";
		vprintf("CREDITS: %.2f  ",array($row["credits"]));
		echo "<br>";
	
	}	
	*/
}
else
{
	echo "0 results.";
}

mysqli_close($connect);

?>

</body>
</html>