<?php require 'common.php';
$email = $_GET['email'];
$confirmcode = $_GET['confirm_code'];
$query ="select * from users where email='$email'";
$data =mysqli_query($con, $query ) or die(mysqli_error($con));
$row=mysqli_fetch_array($data);
if($row['confirm_code']==$confirmcode){

$query = "update users set confirm='Yes' where email='$email' and confirm_code=$confirmcode";
$submit = mysqli_query($con, $query) or die($con);

$confirm= rand();
$query1 = "update users set confirm_code=$confirm where email='$email'";
$submit1 = mysqli_query($con, $query1) or die($con);
$_SESSION['email']=$email;
$_SESSION['id']=mysqli_insert_id($con);
  header('location: ../index.php');
}
else{
    header('location: ../index.php');
}
?>
