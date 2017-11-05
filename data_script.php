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
echo "Connection successful";

$cmd1 = "LOAD DATA INFILE 'StarfishStudentData.csv' INTO TABLE starfish
		FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'
		IGNORE 1 LINES
		(@id,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,
		@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,@dummy,
		@dummy,@dummy,@credits,@dummy,@dummy,@dummy,@dummy,@major,
		@dummy,@dummy,@gpa) 
		set id=@id,major=@major,gpa=@gpa,credits=@credits;";
		
$cmd2 = "LOAD DATA INFILE 'StarfishStudentData.csv' INTO TABLE starfish
		FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'
		(@person_party_id,@prior_total_credit_hours,@primary_major,
		@prior_term_gpa) set id=@person_party_id,major=@primary_major,
		gpa=@prior_term_gpa,credits=@prior_total_credit_hours;";
		
$cmd3 = "SELECT * FROM 'starfish'";

$mysqli = mysqli_query($connect,$cmd1);
if(!$mysqli)
	echo mysqli_error($connect);



mysqli_close($connect);
?>