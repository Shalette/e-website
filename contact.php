<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>
<head>
  <title>Contact Us | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){
    $("form").on('submit', function(ev){
       ev.preventDefault();
      $.post( 'includes/mail.php',
        {
          request: "1",
        name: $("#name").val(),
        phno:$("#phno").val(),
        service: $("#service").val(),
        email: $("#email").val(),
        additional: $("#additional").val()
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

<body style="background-image: url('img/wallpaper.jpg');">
<?php include 'includes/header.php' ?>
<div class="container top">
  <div class="row top">
    <h1 class="text-center" style="color:white; font-size: 50px;"><b>Contact Our Team</b></h1>
    <h4 class="text-center" style="color:white;">Please use the form below to send us a message. We will get back to you ASAP!</h4>
    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading text-center">
          <h3>Get In Touch</h3>
        </div>
        <div class="panel-body">
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-xs-6">
                <input id ="name" type="text" class="form-control"  <?php if (isset($_SESSION['email'])) echo 'disabled value="Name"'?> placeholder="Name" name="name" required = "true">
              </div>
              <div class="form-group col-xs-6">
                <input  id="email" type="email" class="form-control"  <?php if (isset($_SESSION['email'])) echo 'disabled value="Email"'?>  placeholder="Email" name="email" required = "true">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-6">
                <input id="phno" type="tel" class="form-control" placeholder="Phone Number" name="phno" required = "true" pattern="[789]{1}[0-9]{9}">
              </div>
              <div class="form-group col-xs-6">
                <select  id="service" class="form-control" required>
                  <option value="" selected hidden>Select the Service</option>
                  <option value="Food">Food Services</option>
                  <option value="Beauty">Beauty Services</option>
                  <option value="Delivery">Home Delivery</option>
                  <option value="Laundry">Laundry Services</option>
                  <option value="Development">Web Development</option>
                  <option value="Vending">Vending Solutions</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <textarea id="additional" class="form-control" rows="5" name="additional" placeholder="Specific request on required service (Optional)"></textarea>
            </div>
            <button id="submit1" type="submit" name="submit" class="btn btn-dark btn-block">Submit</button>
            <div id="success1"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php
include 'includes/footer.php' ?>
</body>
</html>
