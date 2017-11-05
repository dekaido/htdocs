<html>
  <?php
    $conect = mysql_connect('orgs', 'root', '', 'localhost') or die("DB Connection failed");
    $result = mysql_query($_GET["query"]);
    $thing = "";
    while($row = mysql_fetch_array($result, MYSQL_NUM)){
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
