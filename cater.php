<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>

<head>
  <title>Food Catering in Bhubaneshwar | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){
    var now = new Date(),
    minDate = now.toISOString().substring(0,10);
    $('#date').prop('min', minDate);
    $("form").on('submit', function(ev){
       ev.preventDefault();
      $.post( 'includes/mail.php',
        {
        request: "4",
        name: $("#name").val(),
        phno:$("#phno").val(),
        service: $("#service").val(),
        budget: $("#budget").val(),
        pax: $("#pax").val(),
        date: $("#date").val(),
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
<div id="myCarousel" class="carousel slide top" data-ride="carousel">
<div class="carousel-inner">

  <div class="item active">
    <img src="img/a1.jpg" style="height: 60rem;"/>
    <div class="carousel-caption">
      <div style="background-color: #101010; padding: 5px;"><h3>Take a Look Around!</h3></div>
    </div>
  </div>

  <div class="item">
    <img src="img/aa.jpeg" style="height: 60rem;"/>
    <div class="carousel-caption">
      <div style="background-color: #101010; padding: 5px;"><h3>Our Top Chefs Produce Marvels.</h3></div>
    </div>
  </div>

  <div class="item">
    <img src="img/a52.jpg" style="height: 60rem;"/>
    <div class="carousel-caption">
      <div style="background-color: #101010; padding: 5px;"><h3>Delicious Food Awaits!</h3></div>
    </div>
  </div>

  <div class="item">
    <img src="img/a6.jpg" style="height: 60rem;"/>
    <div class="carousel-caption">
      <div style="background-color: #101010; padding: 5px;"><h3>Book With Us Today.</h3></div>
    </div>
  </div>

</div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
<div class="well text-center"><h1>Available For Every Occasion.</h1></div>

<div class="container top">
<div class="row">
  <div class="col-md-3">
    <img class="img-responsive" src="img/a2.jpg">
    <p><br><br></p>
    <img class="img-responsive" src="img/a3.jpg">
  </div>
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <h3>Order Today</h3>
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
        <select id="service" class="form-control" required>
          <option value="" selected hidden>Select Catering Type</option>
          <option value="Wedding">Wedding Catering</option>
          <option value="Birthday">Birthday Catering</option>
          <option value="Corporate">Corporate caterings (On Monthly basis)</option>
          <option value="Office">Office catering (On Monthly basis)</option>
          <option value="Industrial">Industrial Catering Services (On Monthly basis).</option>
          <option value="College">College Catering</option>
          <option value="Hospital">Hospital Catering</option>
          <option value="Event">Event Caterings</option>
        </select>
      </div>
      <div class="form-group col-xs-6">
        <input id="budget" type="number" class="form-control" placeholder="Budget Per Person" min="150" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <input id="pax" type="number" class="form-control" placeholder="Number of People" min="1" required>
      </div>
      <div class="form-group col-xs-6">
        <input id="date" type="date" class="form-control" placeholder="Pick the Date" min="0"required>
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
<div class="col-md-3">
  <img class="img-responsive" src="img/a4.jpg">
  <p><br></p>
  <img class="img-responsive" src="img/a7.jpg">
  <p><br></p>
  <img class="img-responsive" src="img/a8.jpg">
</div>
</div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
