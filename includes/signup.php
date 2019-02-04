<?php require 'common.php';
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, md5(md5($_POST['pass'])));
$confirmcode = rand();
$message="
Congratulations on creating a new account!
To activate it, click the link below.
https://www.selectiall.com/includes/login_validate.php?email=$email&confirm_code=$confirmcode
";
mail($email, "Selectiall Account Activation", $message, "From: DoNotReply@Selectiall.com");
$query = "insert into users values (DEFAULT,'$email','$fname','$lname', '$password', 'No', $confirmcode)";
$submit = mysqli_query($con, $query) or die($con);
echo '<h5 class="text-success">Registration successful. Confirmation email will be sent shortly</h5>';
?>
