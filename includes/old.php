<?php
require 'common.php';
if (isset($_POST["request"]))
{
  $user_id = $_SESSION['user'];
  $request = mysqli_real_escape_string($con, $_POST['request']);
  if($request=="yes")
  {
  $query = "SELECT * FROM orders WHERE user_id=$user_id and (status='Completed' or status='Cancelled') order by ord_date desc;";
  $data=mysqli_query($con, $query) or die(mysqli_error($con));
  $num=mysqli_num_rows($data);
  if($num==0) {
    echo '<div class="jumbotron top"><center><h2>No History</h2></center></div>';
  }
  else{ ?>
    <?php
    while($row=mysqli_fetch_array($data))
    {
      ?>
      <div class="col-xs-12">
        <div class="well" style="height: 160px;">
          <?php   if($request=="yes") echo $row['ord_date']?>
          <center><h4>Item: <?php echo $row['product_name']; if ($row['product_brand']!='Nothing') echo' ('.$row['product_brand'].')'?></h4>
            <h4>Quantity: <?php echo $row['quantity']; ?></h4>
            <h4>Amount: <?php echo $row['amount']; ?></h4>
            <h4>Status: <?php echo $row['status']; ?></h4></center>

      </div>
    </div>
      <?php
    }
}
}
else {
  echo 0;
}
}
else {
  echo 'NO';
}
?>
