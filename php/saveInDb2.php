<?php

require_once __DIR__. '/credentials.php';

$connectionstr="host=".DB_SERVER."    port=5432    dbname=".DB_BASE."
user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'";

$dbconn=pg_connect($connectionstr);

if (!$dbconn)
{
  die("Connection failed:".pg_connect_error());
}

$sql="UPDATE data
SET  album='".$_POST['album']."',band='".$_POST['band']."',price='".$_POST['price']."' where username='".$_POST['username']."';";

$sql2="SELECT * from data where username='".$_POST['username']."';";

echo $sql;
echo $sql2;

$result=pg_query($dbconn,$sql);
$result2=pg_query($dbconn,$sql2);
$user=$_POST['username'];
$album=$_POST['album'];
$band=$_POST['band'];
$price=$_POST['price'];
if (pg_num_rows($result2)== 0)
{
    echo "<br><br><strong>Error!</strong> We are sorry but this username was not found in the database. You should try to login or register first.";
}
else if ($result)
{
  echo "<br><br>Save was successfull.";
  if ($band=='Queen')
    echo "<script> location.href='../the_queen.html?$user?$album?$band?$price'; </script>";
  else if ($band=='Pink Floyd')
    echo "<script> location.href='../pink_floyd.html?$user?$album?$band?$price'; </script>";
  else {
    echo "<script> location.href='../led_zeppelin.html?$user?$album?$band?$price'; </script>";
  }
}
else {
  echo "<br><br>Save was not successfull";
  die('Query failed:'.pg_last_error());
}

pg_close($dbconn);

 ?>
