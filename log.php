<?php require 'includes/common.php';
if (isset($_SESSION['email']))
{
  header('location: index.php'); } ?>
<!DOCTYPE>
<html>
<head>
  <title>Login / Sign Up | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script src="js/index.js"></script>
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

    $("#email").on('input', function(){
      var val=$(this).val();
      $.ajax({
        url: 'includes/validate.php',
        type: 'POST',
        data:'request='+val,
        success: function(data)
        {
          if(data==0)
          {
            $("#check").html('<h6 class="text-warning"><h6>');
            $("#submit1").removeAttr("disabled");
          }
          else{
            $("#check").html('<h6 class="text-warning">User already exists.</h6>');
            $("#submit1").attr("disabled", "disabled");
          }
        },
      });
    });

    $("#email1").on('input', function(){
      var val1=$(this).val();
      $.ajax({
        url: 'includes/validate.php',
        type: 'POST',
        data:'request='+val1,
        success: function(data)
        {
          if(data==0)
          {
          $("#check2").html('<h6 class="text-warning">User doesn\'t exist.<h6>');
          $("#submit2").attr("disabled", "disabled");
        }
          else
          {
          $("#check2").html('<h6 class="text-warning"></h6>');
          $("#submit2").removeAttr("disabled");
        }
        },
      });
    });

    $("#email2").on('input', function(){
      var val1=$(this).val();
      $.ajax({
        url: 'includes/validate.php',
        type: 'POST',
        data:'request='+val1,
        success: function(data)
        {
          if(data==0)
          {
          $("#check3").html('<h6 class="text-warning">User doesn\'t exist.<h6>');
          $("#submit3").attr("disabled", "disabled");
        }
          else
          {
          $("#check3").html('<h6 class="text-warning"></h6>');
          $("#submit3").removeAttr("disabled");
        }
        },
      });
    });

    $("#form1").on('submit', function(ev){
       ev.preventDefault();
      $.post( 'includes/signup.php',
        {fname: $("#fname").val(),
        lname:$("#lname").val(),
        pass: $("#pass").val(),
        email: $("#email").val()
      }, function(info)
        {
          $("#success1").html(info);
          $("#form1 :input").each(function(){
            $(this).val("");
          });
        });
  });

  $("#form2").on('submit', function(ev2){
     ev2.preventDefault();
      $.post( 'includes/login.php',
        {
        pass: $("#pass1").val(),
        email: $("#email1").val()
      },
      function(info){
        if(info == 0)
        {
        $("#fail1").html('<h6 class="text-warning">Incorrect Password</h6>');
        $("#form2 :input").each(function(){
          $(this).val("");
        });
        }
        else if(info == 2){
          $("#fail1").html('<h6 class="text-warning">Check your email to activate your account</h6>');
          $("#form2 :input").each(function(){
            $(this).val("");
          });
        }
        else {
          window.location.href="index.php";
        }
      });
  });

  $("#form3").on('submit', function(ev3){
     ev3.preventDefault();
      $.post( 'includes/password_recovery.php',
        {
        email: $("#email2").val()
      },
      function(info){
          $("#fail2").html(info);
          $("#form3 :input").each(function(){
            $(this).val("");
          });
        });
  });

});
  </script>
</head>

<body style="background-image: url('img/wallpaper1.jpg'); background-repeat: no-repeat; background-size: 100% 100%;">
<?php include 'includes/header.php';?>
<div class="container top" style="padding-top: 100px;">
<div class="row">
  <div class="col-md-6 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-12 text-center"><h3><b>Sign Up</b></h3></div>
        </div>
      </div>
      <div class="panel-body" style="padding:30px; height: 330px;">
        <form id="form1" method="post" action="">
          <div class="form-group">
            <input type="text" id="email" class="form-control" placeholder="Email"  required = "true">
          </div>
          <div id="check"></div>
          <div class="row">
          <div class="form-group col-xs-6">
            <input type="text" id="fname" class="form-control" placeholder="First Name"  required = "true">
          </div>
          <div class="form-group col-xs-6">
            <input type="text" id="lname" class="form-control" placeholder="Last Name" required = "true">
          </div>
        </div>
          <div class="form-group">
            <input id="pass" type="password" class="pass form-control" placeholder="Password (Minimum 6 characters)" pattern=".{6,}" name="pass" required = "true">
          </div>
          <div class="form-group">
            <input id="repass" type="password" class="pass form-control" placeholder="Confirm Password" required = "true">
          </div>
          <div id="check1"></div>
          <button  id="submit1" class="btn btn-dark btn-block" type="submit">Sign Up</button>
          <div id="success1"></div>
        </form>
      </div>
      <div class="panel-footer">
        <center><h5>We do not share your personal details with anyone.</h5></center>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-12 text-center"><h3><b>Log In</b></h3></div>
        </div>
      </div>
      <div class="panel-body" style="padding:30px; height: 386px;">
        <form id="form2" method="post" action="">
          <div class="form-group">
            <input type="text" id="email1" class="form-control" placeholder="Email" name="email" required = "true">
          </div>
          <div id="check2"></div>
          <div class="form-group">
            <input id="pass1" type="password" class="form-control" placeholder="Password" name="password" required = "true">
          </div>
          <button id="submit2" class="btn-dark btn btn-block" type="submit">Sign In</button>
          <div id="fail1"></div>
          <div style="padding-top:10px;"><a id="a1" href="#">Forgot Password?</a></div>
        </form>

        <form id="form3" method="post" action="">
          <div class="form-group">
            <input type="text" id="email2" class="form-control" placeholder="Email" name="email" required = "true">
          </div>
          <div id="check3"></div>
          <button id="submit3" class="btn-dark btn btn-block" type="submit">Send Email Reset Link</button>
          <div style="padding-top:10px;"><a href="#"id="a2">Sign In</a></div>
          <div id="fail2"></div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
