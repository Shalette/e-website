<?php require 'common.php';
if (isset($_SESSION['email']))
{
  $email = $_SESSION['email'];
  $query ="select * from users where email='$email'";
  $data =mysqli_query($con, $query ) or die(mysqli_error($con));
  $row=mysqli_fetch_array($data);
  $name=$row['fname'];
}
else {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
}
$request = mysqli_real_escape_string($con, $_POST['request']);
$phno = mysqli_real_escape_string($con, $_POST['phno']);
$service = mysqli_real_escape_string($con, $_POST['service']);

if(!empty($_POST['additional']))
$additional=mysqli_real_escape_string($con, $_POST['additional']);
else
$additional ='Nothing';

if($request=="1")
{
$message = "Service Required: $service
Additional Requirements: $additional
Contact Number: $phno

Thank you.
Yours sincerely,
$name";

mail("selectiallservices@gmail.com", "Customer Request", $message, "From: $email");
echo '<h3 class="text-success text-center">We will respond to your query shortly.</h3>';
}
else if ($request=="2"){
$plan = mysqli_real_escape_string($con, $_POST['plan']);
$message = "Meal Type: $service
Meal Plan: $plan
Additional Requirements: $additional
Contact Number: $phno

Thank you.
Yours sincerely,
$name";

mail("selectiallservices@gmail.com", "Meal Request", $message, "From: $email");
echo '<h3 class="text-success text-center">Expect a reply shortly.</h3>';
}
else if($request=="3"){
$pin = mysqli_real_escape_string($con, $_POST['pin']);
$address = mysqli_real_escape_string($con, $_POST['address']);
if(!empty($_POST['shop']))
$shop=mysqli_real_escape_string($con, $_POST['shop']);
else
$shop ='Nothing';

$message = "Service We Offer: $service
Shop Name: $shop
Address: $address - $pin
Contact Number: $phno

Thank you.
Yours sincerely,
$name";

mail("selectiallservices@gmail.com", "Partnership Request", $message, "From: $email");
echo '<h3 class="text-success text-center">We will respond to your offer shortly.</h3>';
}
else if ($request=="4"){
  $budget = mysqli_real_escape_string($con, $_POST['budget']);
  $pax = mysqli_real_escape_string($con, $_POST['pax']);
  $date = mysqli_real_escape_string($con, $_POST['date']);
  $message = "Cater Type: $service
  Budget: &8377; $budget
  Date: $date
  Number of people: $pax
  Additional Requirements: $additional
  Contact Number: $phno

  Thank you.
  Yours sincerely,
  $name";

  mail("selectiallservices@gmail.com", "Meal Request", $message, "From: $email");
  echo '<h3 class="text-success text-center">Thank you. We shall reply shortly.</h3>';
}
?>
