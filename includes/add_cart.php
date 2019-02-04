<?php require 'common.php';
if (!isset($_SESSION['email']))
{
echo 0;
}
else{
$user_id = $_SESSION['user'];
$product = mysqli_real_escape_string($con, $_POST['product']);
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
if(isset($_POST['cold']))
$cold = mysqli_real_escape_string($con, $_POST['cold']);
else
$cold='Nothing';
if(isset($_POST['brand']))
$brand = mysqli_real_escape_string($con, $_POST['brand']);
else
$brand='Nothing';

$query = "SELECT * FROM orders where user_id=$user_id and product_name='$product' and product_brand='$brand' AND extra='$cold' AND status='Not Paid'";
$data = mysqli_query($con, $query) or die(mysqli_error($con));
$num=mysqli_num_rows($data);

$query2 = "SELECT * FROM product where product_name='$product' and product_brand='$brand'";
$data2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$row2=mysqli_fetch_array($data2);
$val=$row2['product_cost'];

if($num!=0)
{
  $row=mysqli_fetch_array($data);
  $val1=$row['amount'];
  $val2=$row['quantity'];
  $quantity= $quantity+intval($val2);
  $amount= intval($val)*intval($quantity)+intval($val1);
  $query1 = "UPDATE orders set amount = $amount where user_id=$user_id and product_name='$product' and product_brand='$brand' AND extra='$cold' AND status='Not Paid'";
  $data1 = mysqli_query($con, $query1) or die(mysqli_error($con));
  $query3 = "UPDATE orders set quantity=$quantity where user_id=$user_id and product_name='$product' and product_brand='$brand' AND extra='$cold' AND status='Not Paid'";
  $data3 = mysqli_query($con, $query3) or die(mysqli_error($con));
  $query4 = "UPDATE orders set ord_date = DEFAULT where user_id=$user_id and product_name='$product' and product_brand='$brand' AND extra='$cold' AND status='Not Paid'";
  $data4 = mysqli_query($con, $query4) or die(mysqli_error($con));
}
else{
$amount= intval($val)*intval($quantity);
$query1 = "INSERT INTO orders VALUES(DEFAULT, $user_id, '$product', '$brand', $quantity, '$cold', 'Not Paid', DEFAULT, $amount)";
$data1 = mysqli_query($con, $query1) or die(mysqli_error($con));
}
echo 1;
}
?>
