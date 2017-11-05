<html>
  <?php
    $connect = mysqli_connect('localhost', 'root', '', 'orgs') or die("DB Connection failed");
    //$result = mysqli_query($_GET["query"]);
	$result = mysqli_query($connect,$_GET["query"]);
    $thing = "";
    while($row = mysqli_fetch_array($result, MYSQL_NUM)){
         foreach($ros as $cname => $cvalue){
             $thing = $thing."\n".$cname." :\t".$cvalue;
         }
    }

  ?>
  <body>
    <form>
      Query<input name="query" type="text" method="get"/><br/>
      Result:<pre><?php echo $thing; ?></pre>
    </form>
  </body>
</html>
