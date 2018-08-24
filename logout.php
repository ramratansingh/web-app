<?php
include('database/db.php');
include("function/function.php");
  session_start();
  session_destroy();
  echo 'Logout Successfully';

?>