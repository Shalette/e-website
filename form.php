<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>
<head>
  <title>Home Delivery | Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function(){
    $("form").on('submit', function(ev){
      ev.preventDefault();
  alert($(this).find('.cold').html());
    });
  });
  </script>
</head>

<body>
<?php include 'includes/header.php' ?>
<div class="container top">
  <div class="top">
    <div class="row panel">
      <div class="col-xs-12 panel-info">
        <div class="row panel-heading">
          <div class="col-xs-3"><h3>Item Name</h3></div> <div class="col-xs-3"><h3>Quantity</h3></div> <div class="col-xs-6"><h3>Price</h3></div>
        </div>
        <div class="row panel-footer">
              <form method="post">


                <div class="col-xs-3"><span class="product">Cold Drinks</span>
                  <span class="cold">Sprite</span>(<span class="brand">2 Lts</span>)</div>
                  <div class="col-xs-3" class="quantity">1</div>
                  <div class="col-xs-3"><span>95.00</span></div>
                <div class="col-xs-3"><button type="submit"  value="submit" class="btn btn-block btn-danger">Remove Item</button></div>

          </form>
        </div>
        <div class="row panel-footer">
              <form method="post">


                <div class="col-xs-3"><span class="product">Cold Drinks</span>
                <span class="cold">Sprite</span> (<span class="brand">2 Lts</span>)</div>
                  <div class="col-xs-3"><h4 class="quantity">1</h4></div>
                  <div class="col-xs-3"><h4>95.00</h4></div>
                <div class="col-xs-3"><button type="submit"  value="submit" class="btn btn-block btn-danger">Remove Item</button></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
