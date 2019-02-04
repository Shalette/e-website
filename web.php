<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>

<head>
  <title>Web Development in Bhubaneshwar | Selectiall Services</title>
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

<body>
<?php include 'includes/header.php' ?>
<div class="top text-center" style="background-image: url('img/web.jpg'); background-repeat: no-repeat; background-size: 100% 100%; height: 50rem;">
  <div class="container top"><center><div class="top jumbotron" style="width: 50%;padding-top: 6rem; background-color: #000; opacity: 0.8;"><h2 style="color: #fff;"><b>Selectiall Web Development</b></h2><br><h4 style="color: #efefef;">Selectiall offers high quality and professional IT solutions and services to
meet the evolving needs of businesses across the globe</h4></div></center></div>
  </div>

<div class="container top">

  <div class="text-center"><h3 style="font-size: 36px;"><b>What We Do</b></h3><br>
    <p style="color: #020202; font-size: 22px;">We offer a comprehensive range of IT services & web solutions under one roof for corporates worldwide. These include:</p></div>
    <p><br></p>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading text-center"  style="height: 31rem;">
          <img src="img/icon-service-1.png" alt="branding" >
          <h4 style="font-size: 30px;"><b>Branding</b></h4>
          <p style="font-size: 15px;">Creating a new brand involves a lot of steps right from selecting a name to communicating your point of parity & difference to the world. We at Selectiall, take charge of the entire process and ensures its completion.</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading text-center"  style="height: 31rem;">
          <img src="img/icon-service-2.png" alt="seo" >
          <h4 style="font-size: 30px;"><b>SEO</b></h4>
          <p style="font-size: 15px;">Properly optimizing your website for search engines is critical to your overall internet marketing strategy and success. We’ve helped hundreds of businesses improve their organic success. Let us help you by optimizing your Website.</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-danger">
        <div class="panel-heading text-center"  style="height: 31rem;">
          <img src="img/icon-service-3.png" alt="web" >
          <h4 style="font-size: 30px;"><b>Web Development</b></h4>
          <p style="font-size: 15px;">A website reflects the brand image of a business venture irrespective of its size. At Selectiall, we seek to offer you the best website design and appearances with a host of state-of-the-art design service.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center"><h3 style="font-size: 36px;"><b>Our Services:</b></h3></div>
  <p><br></p>
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4 style="font-size: 30px;"><b>Branding</b></h4>
          <p style="font-size: 15px;">Website promotion, Online Marketing Services, Digital Marketing, Google Adwords, Promotion & Distribution, Offline Marketing Products</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4 style="font-size: 30px;"><b>Web Design</b></h4>
          <p style="font-size: 15px;">Domain Registration/Migration, Web Hosting, Website Maintenance, E-commerce Solution, SSL Certificates, Payment Gateway</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4 style="font-size: 30px;"><b>Search Engine Optimization</b></h4>
          <p style="font-size: 15px;">SEO Services, Social Media Optimization, PPC advertising, Website Analytics, Keyword Research & Canonical Mapping</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h4 style="font-size: 30px;"><b>Android &amp; IOS Application</b></h4>
          <p style="font-size: 15px;">Mobile app development, Android App development, IOS App development, Hybrid App development</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center"  style="height: 15rem;">
          <h4 style="font-size: 30px;"><b>Content Marketing</b></h4>
          <p style="font-size: 15px;">Content writing Services, Newsletter Campaigns, Creative Content, Ideation</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading text-center"  style="height: 15rem;">
          <h4 style="font-size: 30px;"><b>Design Service</b></h4>
          <p style="font-size: 15px;">Logo, Visiting cards, Banners, Postcards, Brochures, Personalised T-shirts, caps, bags, Photo Albums</p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center"><h3 style="font-size: 36px;"><b>Web Design Services</b></h3><br></div>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading text-center" style="height: 110rem;">
          <h4 style="font-size: 30px;"><b>Dynamic Website</b></h4>
          <h1 style="font-size: 50px;">&#8377; 9999</h1>
          <p>Upto 5 fully dynamic pages</p>
          <p style="font-size: 23px;"><br>1 GB Web Space<br><br>10 GB Bandwidth<br><br>Email Ids<br><br>Multiple Design Options<br><br>Admin Panel for Easy update<br><br>Site Search bar Multilayered Menu<br><br>Logo(Non Custom)<br><br>Mobile Friendly Responsive<br><br>Live Chat</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading text-center" style="height: 110rem;">
          <h4 style="font-size: 30px;"><b>Starter Ecommerce</b></h4>
          <h1 style="font-size: 50px;">&#8377; 15999</h1>
          <p>Upto 1000 products</p>
          <p style="font-size: 23px;"><br>Free Domain<br><br>Free Hosting<br><br>10 GB Web space<br><br>100 GB Bandwidth<br><br>10 Email Ids<br><br>Multiple Design Options<br><br>Payment Gateway<br><br>Mobile Friendly<br><br>SMS Integration*<br><br>Automatic Email Alerts<br><br>Logo Design<br><br>Live Chat<br>
            <br>Social Media Tools</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading text-center" style="height: 110rem;">
          <h4 style="font-size: 30px;"><b>Digital Marketing</b></h4>
          <h1 style="font-size: 50px;">Ask For Quote</h1>
          <p>Search Engine Optimization</p>
          <p style="font-size: 23px;"><br>Search Engine Marketing<br><br>Social Media Optimization<br><br>Social Media Marketing<br><br>PPC Management<br><br>Affiliate Marketing<br><br>Content Marketing<br><br>Digital Marketing for online stores<br><br>Landing page Optimization<br><br>Web Analytics<br><br>Events Promotion<br><br>Online PR activities<br><br>Ad campaign<br>
            <br>Strategy Management</p>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="row" style="background-image: url('img/people.jpg'); background-repeat: no-repeat; background-size: 100% 100%; height: 70rem;">
  <div class="col-sm-6 col-sm-offset-3 top">
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        <h3>Apply Today</h3>
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
      <div class="form-group">
        <select  id="service" class="form-control" required>
          <option value="" selected hidden>Select Required Service</option>
          <option value="Branding">Branding</option>
          <option value="Web Design">Web Design</option>
          <option value="Search Engine Optimization">Search Engine Optimization</option>
          <option value="Android &amp; IOS Application">Android &amp; IOS Application</option>
          <option value="Content Marketing">Content Marketing</option>
          <option value="Design Service">Design Service</option>
        </select>
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
