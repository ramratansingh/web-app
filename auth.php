<?php
 require_once('database/db.php');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$stmt = $connection->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bindValue(1, $username, PDO::PARAM_STR);
$stmt->bindValue(2, $password, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows && ($rows[0]['status'] == 2 || $rows[0]['status'] == 1))
{   
	$name = $rows[0]['name'];
	$username = $rows[0]['username'];
	$status = $rows[0]['status'];
	$id =$rows[0]['id'];
	$created_by = $rows[0]['created_by'];
	session_start();
	$_SESSION['name'] = $name;
	$_SESSION['username'] = $username; 
	$_SESSION['status'] =  $status;
	$_SESSION['id'] = $id; 
	$_SESSION['created_by'] = $created_by;
	header("location: user_dashboard.php");
}
else 
{
	echo "<script language=\"JavaScript\">\n";
	echo "alert('Username or Password was incorrect!');\n";
	echo "window.location='index.php'";
	echo "</script>";
}
?>