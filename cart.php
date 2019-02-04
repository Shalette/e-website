<?php require 'includes/common.php';
if (!isset($_SESSION['email']))
{
  header('location: index.php'); } ?>
<!DOCTYPE>
<html>
<head>
  <title>Cart | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function (){
    var elem1=document.getElementById("new");
    var elem2=document.getElementById("old");
    $(elem1).hide();
    $(elem2).on('click', function(){
      $.ajax({
        url: 'includes/old.php',
        type: 'POST',
        data:'request='+"yes",
        success: function(data)
        {
          $("#products").html(data);
          $(elem2).hide();
          $(elem1).show();
        },
      });
    });

    $(elem1).on('click', function(){
      $.ajax({
        url: 'includes/old.php',
        type: 'POST',
        data:'request='+"no",
        success: function(data)
        {
          if(data==0)
          {
            location.reload();
          }
          else{
          $("#products").html(data);
          $(elem1).hide();
          $(elem2).show();
        }
        },
      });
    });

    $('form').on('submit', function(ev){
      ev.preventDefault();
      $.post( 'includes/rem_cart.php',
        {
          product: $(this).find('.product').html(),
        cold: $(this).find('.cold').html(),
        brand: $(this).find('.brand').html()
      }, function(info){
        if(info==1)
        {
          location.reload();
        }
      });
    });

  });
  </script>
</head>
<body>
<?php include 'includes/header.php' ?>
<div class="container top">

  <?php
  $user_id = $_SESSION['user'];
  $query = "SELECT * FROM orders WHERE user_id=$user_id and status='Not Paid' order by ord_date desc;";
  $data=mysqli_query($con, $query) or die(mysqli_error($con));
  $num=mysqli_num_rows($data);
  ?>
   <div id="products" class="top">
   <?php
  if($num==0) {

    echo '<div class="jumbotron top"><center><h2>Add Products to Your Cart!</h2></center></div>';
  }
  else{
      $sum=0;
      ?>

      <div class="row panel table-responsive">
        <div class="col-xs-12 panel-info">
          <div class="row panel-heading">
            <div class="col-xs-4"><h4>Item Name</h4></div> <div class="col-xs-4"><h4>Quantity</h4></div> <div class="col-xs-4"><h4>Price</h4></div>
          </div>
            <?php
    while($row=mysqli_fetch_array($data))
    { $sum=$sum+$row['amount'];
      ?>

      <div class="row panel-footer" style="font-size: 17px;">
        <form method="post">
        <div class="col-xs-4"><span class="product"><?php echo $row['product_name'];?></span>
          <?php if ($row['extra']!='Nothing') echo ' - <span class="cold">'.$row['extra'].'</span>';
          if ($row['product_brand']!='Nothing') echo' (<span class="brand">'.$row['product_brand'].'</span>)';?></div>
        <div class="col-xs-4"><span class="quantity"><?php echo $row['quantity']; ?></span></div>
        <div class="col-xs-2"><span><?php echo $row['amount']; ?></span></div>
        <div class="col-xs-1 col-xs-offset-1"><button type="submit"  value="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" ></span></button></div>
      </form>
      </div>

      <?php
    }
    ?>
    <div class="row well text-center"><div class="col-xs-6"><h3>Total</h3></div><div class="col-xs-6"><h3>&#8377; <?php echo $sum."/-"; ?></h3></div></div>
</div>
</div>
<div class="col-xs-12">
<button style="margin-bottom: 10px;" class="btn btn-dark btn-block">Proceed to Checkout</button>
</div>

  <?php }
  $query1 = "SELECT * FROM orders WHERE user_id=$user_id and status='Paid' order by ord_date desc;";
  $data1=mysqli_query($con, $query1) or die(mysqli_error($con));
  $num1=mysqli_num_rows($data1);
  if($num1>0)
  {?>
    <div class="row panel table-responsive">
      <div class="col-xs-12 panel-info">
        <div class="row panel-heading">
          <div class="col-xs-12 text-center"><h3>Orders Pending Completion</h3></div>
          <div class="col-xs-4"><h4>Item Name</h4></div> <div class="col-xs-4"><h4>Quantity</h4></div> <div class="col-xs-4"><h4>Price</h4></div>
        </div>
              <?php
      while($row=mysqli_fetch_array($data1))
      {
        ?>
        <div class="row panel-footer" style="font-size: 17px;">
          <div class="col-xs-4" ><span class="product"><?php echo $row['product_name'];?></span>
            <?php if ($row['extra']!='Nothing') echo ' - <span class="cold">'.$row['extra'].'</span>';
            if ($row['product_brand']!='Nothing') echo' (<span class="brand">'.$row['product_brand'].'</span>)';?></div>
          <div class="col-xs-4"><span class="quantity"><?php echo $row['quantity']; ?></span></div>
          <div class="col-xs-4"><span><?php echo $row['amount']; ?></span></div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
    <?php

  }
  ?>
  </div>
  <div class="row">
  <div class="col-xs-12">
  <div style="margin-bottom: 10px;">
  <a href="#" id="old" class="btn btn-dark btn-block">View Previous Orders</a>
  <a href="#" id="new" class="btn btn-dark btn-block">View Cart</a>
  </div>
</div>
</div>


</div>
<?php
include 'includes/footer.php' ?>
</body>
</html>
