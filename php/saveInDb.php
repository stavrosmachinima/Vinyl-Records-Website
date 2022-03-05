<?php

require_once __DIR__. '/credentials.php';

$connectionstr="host=".DB_SERVER."    port=5432     dbname=".DB_BASE."
user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'";

$dbconn=pg_connect($connectionstr);

if (!$dbconn)
{
  die("Connection failed:".pg_connect_error());
}

  $sql="INSERT INTO data(firstname,lastname,email,password,username) VALUES
  ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['username']."')";

echo $sql;

$result=pg_query($dbconn,$sql);

if ($result)
{
  echo "<br><br>Register was successfull. You are loggined now.";
}
else
{
  echo "<br><br>Register was not successfull";
  die('Query failed:'.pg_last_error());
}

  $user=$_POST['username'];


if ($result)
{
  echo "<script> location.href='../login_register.html?$user';</script>";
}
else
{
    echo "<script> location.href='../login_register.html?failure'; </script>";
}

pg_close($dbconn);

exit

 ?>
