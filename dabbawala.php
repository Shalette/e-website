<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>

<head>
  <title>Home Delivery in Bhubaneshwar | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){
    $("form").on('submit', function(ev){
       ev.preventDefault();
      $.post( 'includes/mail.php',
        {
        request: "2",
        name: $("#name").val(),
        phno:$("#phno").val(),
        service: $("#service").val(),
        plan: $("#plan").val(),
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

<body style="background-image: url('img/blackboard.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
<?php include 'includes/header.php' ?>
<div class="top text-center" style="background-image: url('img/feast.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
  <div class="container top"><div class="jumbotron top" style="background-color: #000; opacity: 0.95"><h1 style="color: #fff;">FRESH . TASTY . AFFORDABLE</h1><br><p style="color: #efefef; font-size: 37px; font-style: italic; ">All at your doorstep!</p></div></div>
  </div>

<div class="container top">
<div class="col-md-6" style="background-image: url('img/food.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
  <div class="jumbotron top text-center" style="background-color: #fefefe; opacity: 0.8"><h3 style="color: #000; font-size: 36px;"><b>Why Choose Us?</b></h3><br>
    <p style="color: #020202; font-size: 22px;"> At Selectiall, we source ingredients of the highest quality. To provide you with the best experience possible, our chefs whip up delicious, wholesome meals within minutes. With swift delivery and great customer service, we make YOU our main priority.</p></div>
</div>
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <img class="image-reponsive" src="img/culinary.png"/><h3>Apply Today</h3>
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
    <div class="form-group">
      <input id="phno" type="tel" class="form-control" placeholder="Phone Number" name="phno" required = "true" pattern="[789]{1}[0-9]{9}">
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <select  id="service" class="form-control" required>
          <option value="" selected hidden>Select Meal Type</option>
          <option value="Vegetarian">Vegetarian</option>
          <option value="Non-vegetarian">Non-vegetarian</option>
        </select>
      </div>
      <div class="form-group col-xs-6">
        <select  id="plan" class="form-control" required>
          <option value="" selected hidden>Select Meal Plan</option>
          <option value="Fortnightly">Fortnightly</option>
          <option value="Monthly">Monthly</option>
          <option value="Yearly">Yearly</option>
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
<?php include 'includes/footer.php' ?>
</body>
</html>
