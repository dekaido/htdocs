<?php

$connect = mysqli_connect("localhost", "current_user()", "", "orgs");

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
		
$mysqli = mysqli_query($mysqli_connect,$cmd1);
if(!$mysqli)
	echo mysqli_error($mysqli_connect);
mysqli_close($mysqli_connect);
?>