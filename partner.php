<?php require 'includes/common.php';
if (isset($_SESSION['email']))
{
  header('location: index.php'); } ?>
<!DOCTYPE>
<html>
<head>
  <title>Become Our Partner | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){
    $("form").on('submit', function(ev){
       ev.preventDefault();
      $.post( 'includes/mail.php',
        {
          request: "3",
        name: $("#name").val(),
        phno:$("#phno").val(),
        service: $("#service").val(),
        shop: $("#shop").val(),
        email: $("#email").val(),
        pin: $("#pin").val(),
        address: $("#address").val()
      }, function(info)
        {
          $("#success1").html(info);
          $("form :input").each(function(){
            $(this).val("");
          });
          window.setInterval(function() {
            location.reload();}, 2000);
        });
  });
});
</script>
</head>

<body style="background-image: url('img/wallpaper2.jpg'); background-repeat: no-repeat;
    background-size: 100% 100%;">
<?php include 'includes/header.php' ?>
<div class="container top">
  <div class="row top">
    <div class="col-xs-12 col-md-6 text-center">
      <img src="img/logo.png" style="width: 70%;"/>
      <h1 style="color:#080808;"><b>Become our Partner. Expand Your Business.</b></h1>
      <br><br>
    </div>
    <div class="col-md-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3><b>Join Us</b></h3>
        </div>
        <div class="panel-body">
          <form action="includes/mail1.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input id="name" type="text" class="form-control" placeholder="Name" name="name" required>
            </div>
            <div class="form-group">
              <input id="email" type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
              <input id="phno" type="tel" class="form-control" placeholder="Phone Number" name="phno" required pattern="[789]{1}[0-9]{9}">
            </div>
            <div class="form-group">
              <select id="service" class="form-control" name="service" required>
                <option value="" selected hidden>Pick Your Service</option>
                <option value="Food">Food Services</option>
                <option value="Beauty">Beauty Services</option>
                <option value="Home">Home Delivery</option>
                <option value="Laundry">Laundry Services</option>
                <option value="Web">Web Development</option>
                <option value="Vending">Vending Solutions</option>
              </select>
            </div>
            <div class="form-group">
              <input id="shop" type="text" class="form-control" placeholder="Shop Name (Optional)" name="shop">
            </div>
            <div class="form-group">
              <input id="address" type="text" class="form-control" placeholder="Address" name="address" required>
            </div>
            <div class="form-group">
              <input id="pin"type="tel" class="form-control" placeholder="Pin Code" name="pin" required pattern="[1-9]{1}[0-9]{5}">
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label><input type="checkbox" value="" required>Please tick here to agree to our <a href="terms.php">Terms and Conditions</a></label>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-dark btn-block">Send</button>
            <div id="success1"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
