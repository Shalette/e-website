<?php require 'common.php';
if($_POST['request']){
  $request=$_POST['request'];
  $query1 = "SELECT * FROM users where email='$request'";
  $data1=mysqli_query($con, $query1) or die(mysqli_error($con));
  $num1=mysqli_num_rows($data1);
  if($num1 == 0)
  echo 0;
  else
  echo 1;
}
  ?>
