<?php
include('database/db.php');
include('function/function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM users 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["username"] = $row["username"];
  $output["password"] = $row["password"];
  $output["email"] = $row["email"];
  $output["mobile_no"] = $row["mobile_no"];
  $output["address"] = $row["address"];
 } 
 echo json_encode($output);
}
?>
   

