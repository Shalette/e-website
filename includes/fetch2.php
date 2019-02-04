<?php require 'common.php';
if($_POST['request']){
  $request=$_POST['request'];
  ?>
<div class="panel panel-default">
  <?php
  $query1 = "SELECT * FROM product natural join parts WHERE item_id=2 AND (product_name like '%$request%' OR parts_name like '%$request%')";
  $data1=mysqli_query($con, $query1) or die(mysqli_error($con));
  $num1=mysqli_num_rows($data1);
  if($num1==0) {
    ?>
    <div class="panel-body"><center><h3>No Results!</h3></center></div></div></div>
  <?php }
  else{
    ?>
    <div class="panel-body">
      <div class="row">
      <?php
          while($row1=mysqli_fetch_array($data1))
          { $link1= "img/".$row1['parts_pic'].$row1['product_id'].".".$row1['product_pic'];
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="thumbnail">
                <form method="post">
                <img src= "<?php echo $link1; ?>" class="img-circle ifix"/>
                <div class="caption text-center" style="height: 100px;">
                  <h4 class="product"><?php echo $row1['product_name']; ?></h4>
                <?php
                $rep1=$row1['product_name'];
                $rep= $row1['parts_name'];
                $query2 = "SELECT * FROM product natural join parts WHERE item_id=2 AND (parts_name='$rep' AND product_name='$rep1')";
                $data2=mysqli_query($con, $query2) or die(mysqli_error($con));
                $num2=mysqli_num_rows($data2);
                if($num2>1){
                  if($rep=="Hair Colour")
                    $rep="Colour";
                  else if($rep=="Hair Smoothening")
                    $rep="Smoothening";
                  else if($rep=="Hair Straightening")
                    $rep="Straightening";
                  ?>
                  <p id="<?php echo "id".$rep.$row1['product_id'];?>">Pick an Option</p>
                  <p class="good-add text-success"></p>
                  <?php echo"</div>";
                  ?>
                  <div class="form-group">
                  <select class="form-control brand" id="<?php echo "sel".$rep.$row1['product_id']; ?>" required>
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
                <div class="form-group">
                  <input type="number" class="form-control quantity" min="1" value="1" required>
                </div>
              <?php }
                else{ ?>
                <p>&#8377; <?php echo $row1['product_cost']; ?></p>
                <p class="good-add text-success"></p>
              </div>
                <div class="form-group fmar">
                  <input type="number" class="form-control quantity" min="1" value="1" required>
                </div>
            <?php  } ?>
                <button class="btn btn-dark btn-block" <?php if($row1['product_avail'] == 'No') echo "disabled";?>>
                  <?php if($row1['product_avail'] == 'No') echo "Out of Stock"; else echo "Add to Cart";?></button>
                </form>
              </div>
            </div>
        <?php
        }
       ?>
      </div>
    </div>
  </div>
<?php
}
}
?>
