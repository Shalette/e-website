<?php require 'includes/common.php';
$email = $_GET['email'];
$confirmcode = $_GET['confirm_code'];
$query ="select * from users where email='$email'";
$data =mysqli_query($con, $query ) or die(mysqli_error($con));
$row=mysqli_fetch_array($data);
if($row['confirm_code']==$confirmcode){
?>
<!DOCTYPE>
<html>
<head>
  <title>Reset Password | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){

    $("input.pass").on('input', function(){
      var value=$("#repass").val();
      var value1=$("#pass").val();
      if(value == value1){
        $("#check1").html('<h6 class="text-warning"></h6>');
        $("#submit1").removeAttr("disabled");
      }
      else {
        $("#check1").html('<h6 class="text-warning">Passwords Do Not Match</h6>');
        $("#submit1").attr("disabled", "disabled");
      }
    });

    $("#submit1").click(function(){
      var value = $("#pass").val();
      $.ajax({
        type: 'POST',
        data:'request='+value,
        success: function(data)
        {
          $("#success1").html('<h2 class="text-success text-center">Password Changed Successfully</h2>');
          window.setInterval(function() {
                window.location= ("index.php");}, 2000);
        },
      });
    $("form").submit(function(){
      return false;
    });
  });
});
  </script>
</head>

<body>
<?php include 'includes/header.php';?>
  <div class="container top">
<div class="row top">
  <div class="col-md-6 col-md-offset-3 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-12 text-center"><h3><b>Reset Password</b></h3></div>
        </div>
      </div>
      <form action="" method="post">
      <div class="form-group">
        <input id="pass" name="pass" type="password" class="pass form-control" placeholder="New Password (Minimum 6 characters)" pattern=".{6,}" name="pass" required = "true">
      </div>
      <div class="form-group">
        <input id="repass" type="password" class="pass form-control" placeholder="Confirm Password" required = "true">
      </div>
      <div id="check1"></div>
      <button id="submit1" class="btn-dark btn btn-block" type="submit" name="submit">Reset Password</button>
      <div id="success1"></div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
<?php
if( isset($_POST['request'])){
$pass = mysqli_real_escape_string($con, md5(md5($_POST['request'])));
$query = "update users set password='$pass' where confirm_code=$confirmcode and email='$email'";
$submit = mysqli_query($con, $query) or die($con);

$confirm = rand();
$query1="update users set confirm_code=$confirm where email='$email'";
$submit1 = mysqli_query($con, $query1) or die($con);

}
}
else{
  header('location: index.php');
}

?>
