<?php
require 'common.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$confirmcode = rand();
$query="update users set confirm_code=$confirmcode where email='$email'";
$submit = mysqli_query($con, $query) or die($con);
$message="
Click the link below to reset your password.
https://www.selectiall.com/recovery.php?email=$email&confirm_code=$confirmcode
";
mail($email, "Selectiall Reset Account Password", $message, "From: DoNotReply@Selectiall.com");
echo '<h5 class="text-success">Recovery email will be sent shortly.</h5>';
?>
