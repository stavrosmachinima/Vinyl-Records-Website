<?php

require_once 'credentials.php';

$connectionstr="host=".DB_SERVER."    port=5432 dbname=".DB_BASE."
user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'";

$dbconn=pg_connect($connectionstr);

if (!$dbconn)
{
  die("Connection failed:".pg_connect_error());
}

$sql="SELECT * FROM data where username='".$_POST['usernameLogin']."'and password='".$_POST['passwordLogin']."';";

echo $sql;

$result=pg_query($dbconn,$sql);

if (pg_num_rows($result)== 0)
{
  echo "<br><br><strong>Error:</strong>Your password or username was wrong or you have not registered.<br><br>";

}
else if ($result)
{
  echo "<br><br>Login was successfull";

}
else
{
  echo "<br><br>Something went wrong<br>";
  die('Query failed:'.pg_last_error());
}


echo "<table style='border:1px solid black'";
echo "<tr><th>Username</th><th>Firstname</th><th>Lastname</th><th></th><th>Email</th><th></th><th>Password</th><th></th><th>Album</th><th></th><th>Band</th><th></th><th>Price</th></tr>";

$user;
$album;
$band;
$price;
while ($row=pg_fetch_assoc($result))
{
  $user=$row['username'];
  $album=$row['album'];
  $band=$row['band'];
  $price=$row['price'];
  echo "<tr><td>".$row['username']."</td>".
        "<td>".$row['firstname']."</td>".
        "<td>".$row['lastname']."<td>".
        "<td>".$row['email']."<td>".
        "<td>".$row['password']."<td>".
        "<td>".$row['album']."<td>".
        "<td>".$row['band']."<td>".
        "<td>".$row['price']."<td>"."</tr>";
}

echo "</table>";


if (pg_num_rows($result)== 0)
{
  echo "<script> location.href='../login_register.html?failure'; </script>";
}
else if ($result)
{
    echo "<script> location.href='../login_register.html?$user?$album?$band?$price'; </script>";
}



pg_close($dbconn);



exit;


?>
