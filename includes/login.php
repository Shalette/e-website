<?php require 'common.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, md5(md5($_POST['pass'])));
$query1= "select * from users where email='$email'";
$data = mysqli_query($con, $query1);
$info = mysqli_fetch_array($data);
  if($info['password'] == $password){
    if($info['confirm']=='Yes')
    {
    $_SESSION['email']=$email;
    $_SESSION['user']=$info['user_id'];
    $_SESSION['id']=mysqli_insert_id($con);
    echo 1;
    }
    else {
      echo 2;
    }
  }
  else{
    echo 0;
  }
?>
