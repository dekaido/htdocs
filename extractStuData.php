<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "orgs";

$connect = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_error())
{
	die("Connection failed: " . mysqli_connect_error());	
}
echo "Connection successful. <br>";

$cmd1 = "DELETE FROM starfish;";
$cmd2 = "LOAD DATA INFILE 'StarfishStudentData.csv' 
		REPLACE INTO TABLE starfish
		FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'
		IGNORE 1 LINES
		(@id,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,
		@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,
		@dummy,@dummy,@credits,@dummy,@dummy,@dummy,@dummy,@major,
		@dummy,@dummy,@gpa) 
		set id=@id,major=@major,gpa=@gpa,credits=@credits;";
		
$cmd3 = "LOAD DATA INFILE 'StarfishStudentData.csv' INTO TABLE starfish
		FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'
		(@person_party_id,@prior_total_credit_hours,@primary_major,
		@prior_term_gpa) set id=@person_party_id,major=@primary_major,
		gpa=@prior_term_gpa,credits=@prior_total_credit_hours;";
		
$cmd4 = "SELECT * FROM starfish;";

$mysqli = mysqli_query($connect,$cmd1);
if(!$mysqli) echo mysqli_error($connect);

$mysqli = mysqli_query($connect,$cmd3);
if(!$mysqli) echo mysqli_error($connect);

#$result4 = $cmd4->query($cmd4);
$result4 = mysqli_query($connect, $cmd4);
echo mysqli_num_rows($result4), " entries updated.<br>";
if(mysqli_num_rows($result4) > 0)
{
	#echo "<table><tr><th>ID</th><th>MAJOR</th><th>GPA</th><th>CREDITS</th></tr>";
	
	while($row = mysqli_fetch_assoc($result4))
	{
		
		vprintf("ID: %7d ",array($row["id"]));
		#echo "\t";
		vprintf("MAJOR: %s  ",array($row["major"]));
		#echo "\t\t\t";
		vprintf("GPA: %.2f  ",array($row["gpa"]));
		#echo "\t";
		vprintf("CREDITS: %.2f  ",array($row["credits"]));
		echo "<br>";
		
		#echo "ID: " . $row["id"] . "Major: " . $row["major"] . 
		#"GPA: " . $row["gpa"] . "Credits: " . $row["credits"] . "<br>";
	}	
}
else
{
	echo "0 results.";
}

mysqli_close($connect);
?>