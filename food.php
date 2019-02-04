<?php require 'includes/common.php'; ?>
<!DOCTYPE>
<html>
<head>
  <title>Online Food Delivery in Bhubaneswar|Selectiall Services</title>
  <?php include 'includes/additional.php' ?>
  <script>
  $(document).ready(function (){
    $("#filter").on('input', function(){
      var value=$(this).val();
      $.ajax({
        url: 'includes/fetch1.php',
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

  });
  </script>
  <script src="js/option.js"></script>
</head>

<body>
<?php include 'includes/header.php' ?>
  <div class="top res">
    <img class="image-reponsive" src="img/foodback.jpg" style="width:100%"/>
    <a class="btn btn-danger ord ord1">Download Our Menu</a>
  </div>

  <div class="container top">

    <div class="form-group">
      <input type="text" class="form-control" id="filter" placeholder="Enter the keywords of your search.">
    </div>
  <div id="content">
  </div>
  <?php
  $query = "SELECT * FROM parts WHERE item_id=1;";
  $data=mysqli_query($con, $query) or die(mysqli_error($con));
  $num=mysqli_num_rows($data);
  if($num==0) {
    echo '<div class="jumbotron" ><center><h2>No Products Today!</h2></center></div>';
  }
  else{
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
        $query1 = "SELECT * FROM parts natural join product WHERE item_id=1 AND parts_id=$j";
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
                      $query2 = $query1." AND product_id=$k AND product_avail='Yes' order by product_brand DESC";
                      $data2=mysqli_query($con, $query2) or die(mysqli_error($con));
                      $num2=mysqli_num_rows($data2);
                      $rep= $row['parts_name'];
                      if($num2>1){
                        if($rep=="Tandoor Kababs")
                          $rep="Tandoor";
                        else if($rep=="Fast Food")
                          $rep="Fast";
                        ?>
                        <p id="<?php echo "id".$rep.$k;?>">Pick an Option</p>
                        <p class="good-add text-success"></p>
                        <?php echo"</div>";
                        $flag=0;
                        if ($row1['product_name'] == "Cold Drinks")
                          $flag = 1;
                        ?>
                        <div class="form-group">
                        <select class="form-control brand" <?php if ($flag==1) echo 'style="width:50%; display:inline;"'?> id="<?php echo "sel".$rep.$k; ?>" required>
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
                        <?php if ($flag==1){
                          $query3 = "SELECT * FROM drink";
                          $data3=mysqli_query($con, $query3) or die(mysqli_error($con)); ?>
                          <select class="form-control cold" style="width:50%; float: left;" required>
                            <option selected hidden>Select</option>
                            <?php  while($row3=mysqli_fetch_array($data3)){?>
                            <option><?php echo $row3['drink_name']; ?></option>
                          <?php } ?>
                          </select>
                          <?php } ?>
                      </div>
                      <?php }
                      else{ ?>
                      <p><?php echo "&#8377; ".$row1['product_cost'] ?></p>
                      <p class="good-add text-success"></p>
                      <?php echo "</div>"; } ?>
                      <div class="form-group <?php if($row1['product_pad'] == 'Yes') echo "fmar";?>">
                        <input type="number" class="form-control quantity" min="1" value="1" required = "true">
                      </div>
                      <button type="submit" value="submit" class="btn btn-dark btn-block" <?php if($row1['product_avail'] == 'No') echo "disabled";?>>
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
 <?php include 'includes/footer.php' ?>
</body>
</html>
