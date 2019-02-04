<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>
<head>
  <title>Home Parlour Services in Bhubaneswar|Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script src="js/option.js"></script>
  <script>
    $(document).ready(function (){
      $("#filter").on('input', function(){
        var value=$(this).val();
        $.ajax({
          url: 'includes/fetch2.php',
          type: 'POST',
          data:'request='+value,
          beforeSend:function()
          {
            $("#content").html("<div class='jumbotron text-center'><h3>Loading</h3></div>");
          },
          success: function(data)
          {
            $("#content").html(data);
            $("select").change(function(){
              var id = $(this).attr("id");
              var id1= id.substring(3);
              var id2="id"+id1;
              $("#"+id2).html("&#8377; "+$("#"+id).val());
              });
              $("form").on('submit', function(ev){
                ev.preventDefault();
                var elem=$(this).find('.good-add');
                $.post( 'includes/add_cart.php',
                  {
                    product: $(this).find('.product').html(),
                  quantity: $(this).find('.quantity').val(),
                  cold: $(this).find('.cold option:selected').html(),
                  brand: $(this).find('.brand option:selected').html()
                }, function(info){
                  if(info==0)
                  window.location.href="log.php";
                  else {
                    $(elem).html("Added to Cart");
                  }
                });
              });
          },
        });
      });

      $("form").on('submit', function(ev){
        ev.preventDefault();
        var elem=$(this).find('.good-add');
        $.post( 'includes/add_cart.php',
          {
            product: $(this).find('.product').html(),
          quantity: $(this).find('.quantity').val(),
          brand: $(this).find('.brand option:selected').html()
        }, function(info){
          if(info==0)
          window.location.href="log.php";
          else {
            $(elem).html("Added to Cart");
          }
        });
      });
    });
  </script>
</head>

<body>
<?php include 'includes/header.php' ?>
  <div class="top res">
    <img class="image-reponsive" src="img/beautyback.jpg" style="width:100%"/>
    <a class="btn btn-danger ord ord2">Download Our Menu</a>
  </div>

  <div class="container top">

      <div class="form-group">
        <input type="text" class="form-control" id="filter" placeholder="Enter the keywords of your search.">
      </div>
    <div id="content">
    </div>
  <?php
  $query = "SELECT * FROM parts WHERE item_id=2;";
  $data=mysqli_query($con, $query) or die(mysqli_error($con));
  $num=mysqli_num_rows($data);
  if($num==0) {
    echo '<div class="jumbotron" ><center><h2>No Products Today!</h2></center></div>';
  }
  else{?>
      <?php
    $j=1;
    while($row=mysqli_fetch_array($data))
    { $link="collapse".$j;
      ?>
    <div class="panel-group">
      <div class="panel panel-default">

        <a data-toggle="collapse" href=<?php echo "#".$link ?>>
          <div class="panel-heading tab">
            <div class="panel-title"><h4><?php echo $row['parts_name']; ?></h4></div>
          </div>
        </a>
        <?php
        $k=1;
        $query1 = "SELECT * FROM product natural join parts WHERE item_id=2 AND parts_id=$j";
        $data1=mysqli_query($con, $query1) or die(mysqli_error($con));
        $num1=mysqli_num_rows($data1);
        if($num1==0) {
          echo '<div id="'.$link.'"class="panel-collapse collapse"><center><h3>No Products Today!</h3></center></div></div></div>';
        }
        else{
          ?>

        <div id="<?php echo $link; ?>"class="panel-collapse collapse">
          <div class="panel-body">
            <div class="row">
            <?php
                while($row1=mysqli_fetch_array($data1))
                { $link1= "img/".$row1['parts_pic'].$k.".".$row1['product_pic'];
                  ?>
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <form method="post">

                      <img src= "<?php echo $link1; ?>" class="img-circle ifix"/>
                      <div class="caption text-center" style="height: 100px;">
                        <h4 class="product"><?php echo $row1['product_name']; ?></h4>
                      <?php
                      $query2 = "SELECT * FROM product natural join parts WHERE item_id=2 AND parts_id=$j AND product_id=$k AND product_avail='Yes' order by product_brand ASC";
                      $data2=mysqli_query($con, $query2) or die(mysqli_error($con));
                      $num2=mysqli_num_rows($data2);
                      $rep= $row['parts_name'];
                      if($num2>1){
                        if($rep=="Hair Colour")
                          $rep="Colour";
                        else if($rep=="Hair Smoothening")
                          $rep="Smoothening";
                        else if($rep=="Hair Straightening")
                          $rep="Straightening";
                        ?>
                        <p id="<?php echo "id".$rep.$k;?>">Pick an Option</p>
                        <p class="good-add text-success"></p>
                        <?php echo"</div>";
                        ?>
                        <div class="form-group">
                        <select class="form-control brand" id="<?php echo "sel".$rep.$k; ?>" required>
                          <option value="" selected hidden>Select</option>
                          <?php
                          $l=1;
                          while($row2=mysqli_fetch_array($data2)){
                            if($row2['product_avail']=='Yes')?>
                              <option value="<?php echo $row2['product_cost']?>"><?php echo $row2['product_brand']; ?></option>
                          <?php $l=$l+1;
                          }
                          for($i=1; $i<$l-1;$i++)
                            $row1=mysqli_fetch_array($data1);
                          ?>
                        </select>
                      </div>
                      <?php }
                      else{ ?>
                      <p>&#8377; <?php echo $row1['product_cost']; ?></p>
                      <p class="good-add text-success"></p>
                      <?php echo "</div>"; } ?>
                      <div class="form-group <?php if($row1['product_pad'] == 'Yes') echo "fmar";?>">
                        <input type="number" class="form-control quantity" min="1" value="1">
                      </div>
                      <button value="submit" type="submit" class="btn btn-dark btn-block" <?php if($row1['product_avail'] == 'No') echo "disabled";?>>
                        <?php if($row1['product_avail'] == 'No') echo "Out of Stock"; else echo "Add to Cart";?></button>
                      </form>
                    </div>
                  </div>
              <?php $k=$k+1;
              }
             ?>
            </div>
          </div>
        </div>
 <?php
 echo "</div>";
 echo "</div>";
} $j=$j+1;
}
}?>
</div>
  <div class="well text-center">
    <h3 style="color:black; margin-bottom:25px">Why book from Selectiall?</h3>
    <p>Our beauticians go through rigorous training to ensure that we provide the best services. Selectiall adapts global professional standards to the home environment. With sharp focus on keeping you gorgeous and prepared for every occassion, Selectiall brings home the best products like waxing with Rica, or facials with Shahnaz and much more!
      Are you searching for “Beauty services near me” on Google? Don’t waste time calculating routes and reading reviews from strangers. Just visit our site and make bookings with expert beauticians within a few minutes.
      You can choose from hair extensions, facials and many other skin and hair treatments.
      You don’t have to worry about lines, delays or unnecessary waiting because the experts at Selectiall are on time. Disposable kits are always used to ensure absolute hygiene. In additionn, our experts come equipped with top-notch products, tools and supplies to provide the skin and hair care services you desire.
  </p>
  <h4 style="color:black;">Enjoy beauty services at home by booking online at Selectiall today!</h4>
</div>
 <?php include 'includes/footer.php' ?>
</body>
</html>
