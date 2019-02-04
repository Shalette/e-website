<?php require 'common.php';
$user_id = $_SESSION['user'];
$product = mysqli_real_escape_string($con, $_POST['product']);
if(isset($_POST['cold']))
$cold = mysqli_real_escape_string($con, $_POST['cold']);
else
$cold='Nothing';
if(isset($_POST['brand']))
$brand = mysqli_real_escape_string($con, $_POST['brand']);
else
$brand='Nothing';

$query = "DELETE FROM orders where user_id=$user_id and product_name='$product' and product_brand='$brand' AND extra='$cold' AND status='Not Paid'";
$submit = mysqli_query($con, $query) or die(mysqli_error($con));
echo 1;
?>
