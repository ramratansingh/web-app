  <?php
include('database/db.php');
include('function/function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $statement = $connection->prepare("
   INSERT INTO users (name, username, password, email, mobile_no, address,status) 
   VALUES (:name, :username, :password, :email, :mobile_no, :address, 2)
  ");
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"], 
    ':username' => $_POST["username"],
    ':password'  => $_POST["password"],
    ':email' => $_POST["email"],
    ':mobile_no' => $_POST["mobile_no"],
    ':address'  => $_POST["address"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {

  $statement = $connection->prepare(
   "UPDATE users 
   SET name = :name, username = :username, password = :password, email = :email, mobile_no = :mobile_no, address = :address  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':username' => $_POST["username"],
    ':password'  => $_POST['password'],
    ':email' => $_POST["email"],
    ':mobile_no' => $_POST["mobile_no"],
    ':address'  => $_POST['address'],
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>