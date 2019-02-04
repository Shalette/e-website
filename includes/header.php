<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <?php if (!isset($_SESSION['email']))
    {   ?>
    <div class="navbar-header" id="navi">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a href="index.php"  class="navbar-brand" id="navbd"><img id="brand" src="img/logo.png"/></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="nav">
        <li><a href="index.php" title="Main Page"><span class = "glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home </a></li>
        <li><a href="partner.php" title="Join Us"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Become our partner</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;Shop&nbsp;<span id="button" class="glyphicon glyphicon-menu-down"></span></a>
          <ul class="dropdown-menu drop">
            <li><a href="food.php" title="Order Now"><span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;Food</a></li>
            <li><a href="beauty.php" title="Book Now"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Beauty</a></li>
          </ul>
        </li>
        <li><a title="Access Account" href="log.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login / Signup</a></li>
        <li><a href="contact.php" title="Reach Us"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Contact Us</a></li>
      </ul>
    </div>

    <?php
  } else{
     ?>
     <div class="navbar-header" style="min-height: 90px;">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a href="index.php"  class="navbar-brand"><img src="img/logo.png" style="max-height:60px;"/></a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="padding-top: 30px;">
         <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;Shop&nbsp;<span id="button" class="glyphicon glyphicon-menu-down"></span></a>
           <ul class="dropdown-menu drop">
             <li><a href="food.php" title="Order Now"><span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;Food</a></li>
             <li><a href="beauty.php" title="Book Now"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Beauty</a></li>
           </ul>
         </li>
         <li><a title="Cart" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Cart</a></li>
         <li><a href="contact.php" title="Reach Us"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Contact Us</a></li>
         <li><a title="Sign Out" href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
       </ul>
     </div>
   <?php } ?>
  </div>
</nav>
