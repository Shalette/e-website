<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>
<head>
  <title>Online Food Order Home Delivery Service | Home Salon and Beauty Services</title>
  <?php include 'includes/additional.php' ?>
</head>

<body>
<?php include 'includes/header.php';?>

  <div id="myCarousel" class="carousel slide top" data-ride="carousel">
  <div class="carousel-inner">

    <div class="item active">
      <img src="img/ban1.png" alt="Services"/>
      <div class="carousel-caption">
        <a href="dabbawala.php" class="btn btn-dark">Buy Now</a>
      </div>
    </div>

    <div class="item">
      <img src="img/ban2.jpg" alt="Food Delivery"/>
      <div class="carousel-caption">
        <a href="food.php" class="btn btn-dark">Order Now</a>
      </div>
    </div>

    <div class="item">
      <img src="img/ban3.jpg" alt="Beauty Services"/>
      <div class="carousel-caption">
        <a href="beauty.php" class="btn btn-dark">Book Now</a>
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
<div class="jumbotron" style="background-color: black; color: #fff;">
  <center><h2>A Variety of Services from a Single Location</h2></center>
</div>
<div class="container top">
  <div class="row">
    <div class="col-sm-6 col-md-2 col-md-offset-1">
      <a href="food.php">
        <div class="thumbnail tfix">
          <img src="img/menu-1.png" alt="food" >
          <div class="caption text-center">
            <h4>Food Delivery</h4>
          </div>
        </div>
      </a>
    </div>

    <div class="col-sm-6 col-md-2">
      <a href="dabbawala.php">
        <div class="thumbnail tfix">
          <img src="img/menu-2.png" alt="delivery" >
          <div class="caption text-center">
            <h4>Home Delivery</h4>
          </div>
        </div>
      </a>
    </div>

    <div class="col-sm-6 col-md-2">
      <a href="web.php">
        <div class="thumbnail tfix">
          <img src="img/menu-3.png" alt="web">
          <div class="caption text-center">
            <h4>Web Development</h4>
          </div>
        </div>
      </a>
    </div>

    <div class="col-sm-6 col-md-2">
      <a href="vending.php">
        <div class="thumbnail tfix">
          <img src="img/menu-4.png" alt="solutions">
          <div class="caption text-center">
            <h4>Vending Solutions</h4>
          </div>
        </div>
      </a>
    </div>

    <div class=" col-sm-6 col-sm-offset-3 col-md-2 col-md-offset-0">
      <a href="beauty.php">
        <div class="thumbnail tfix">
          <img src="img/menu-5.png" alt="beauty">
          <div class="caption text-center">
            <h4>Beauty Services</h4>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="well col-xs-12">
      <div class="col-sm-6">
        <img src="img/app.png" class="center-block" alt=""></img>
      </div>
      <div class="col-sm-6 text-center">
          <h2 style="color:black">Download Our App</h2>
          <p>Order/Book online the fastest way possible.</p>
          <a href='https://play.google.com/store/apps/details?id=com.services.selectiall&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'>
            <img alt='Get it on Google Play' style="height:90px;" src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png'/>
          </a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="well col-xs-12">
    <h3 class="text-center" style="color:black; margin-bottom:25px">At Selectiall, our only focus is YOU.</h3>
    <div class="col-sm-4 colstyle ffix fbord text-center" >
      <span style="font-size: 25px;" class="glyphicon glyphicon-ok"></span>
      <h4 style="color:black">Verified Professionals</h4>
      <p>All our professionals are background checked and verified to ensure your complete safety.</p>
    </div>
    <div class="col-sm-4 colstyle ffix fbord fpad text-center">
      <span style="font-size: 25px;" class="glyphicon glyphicon-star"></span>
      <h4 style="color:black">Convenience Guaranteed</h4>
      <p>We provide all our services with a simple holistic approach.</p>
    </div>
    <div class="col-sm-4 colstyle  ffix fpad text-center">
      <span style="font-size: 25px;" class="glyphicon glyphicon-thumbs-up"></span>
      <h4 style="color:black">Hassle Free Services</h4>
      <p>Our professionals ensure high quality services, so that your satisfaction levels are always at a 100%.</p>
    </div>
  </div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
