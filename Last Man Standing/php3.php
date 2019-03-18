<?php
$servername = "localhost";
$username = "root";
$password= "";
$dbname = "lastmanstanding";

$conn =new \MySQLi($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn_error);
}
session_start();
$result=mysqli_query($conn,"SELECT Q2,total FROM answers");
$row=mysqli_fetch_assoc($result);
$p=$row['Q2'];
$q=$row['total'];
echo $p;
if($_POST["pswrd"] == $p)
{
mysqli_query($conn,"UPDATE progress SET Q2=1,total=total+1 WHERE TeamID={$_SESSION['user_id']}");
if($q==5)
{
	header('Location: KILL.html');
}
else
header('Location: Questions.html');
}


else{
	$_SESSION['error_message'] = 'Wrong Password';
header('Location: question2.html');
}
?>
