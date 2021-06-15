<?php
    $v = array(); $i = 0; $m = array(); $j = 0;
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $result1 = mysqli_query($conn, "select time FROM pat_med where time >= now() ORDER BY time ASC");
    while($res1 = mysqli_fetch_array($result1)){
        $v[$j] = $res1[0];
        $j++;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicine and Food Timed Display</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<center>

<div style="margin-top: 15%; height: 97px; width: 500px; border: 1px solid #ccc; overflow: auto;">

  <div style="margin-top: 2%;" class="container">

  <?php
    $cntr = mysqli_num_rows($result1);
    while($cntr > 0){//}
    $time = "";
    $h24 = date('H', strtotime($v[$i]));
    $h12 = date('h', strtotime($v[$i]));
    $hm12 = date('h:i', strtotime($v[$i]));
    if($h24 >= 12){
        $time = $hm12." PM";
    }
    else{
        $time = $hm12." AM";
    }?>

    <div class="row" style="margin-bottom: 1%;">

      <div class="col-sm-6">
      <h2><span style="float:right;" class="badge badge-success"><?php echo $time; ?></span></h2>
      </div>
    
      <div class="col-sm-6">

        <div class="dropdown">

          <button type="button" class="btn btn-primary dropdown-toggle" style="margin-left: -35%; padding-left: 10%; padding-right: 10%;" data-toggle="dropdown">
            Dropdown button
          </button>

          <div class="dropdown-menu">
            <?php   
            if(!empty($v[$i])){
              $result2 = mysqli_query($conn, "select * FROM pat_med where time = '$v[$i]'");
              while($res2 = mysqli_fetch_row($result2)){?>

                <h5 class="dropdown-header">Medicine</h5>
                <a class="dropdown-item"><h6>Medicine: <span class="badge badge-success"><?php echo $res2[3]; ?></span></h6></a>
                <a class="dropdown-item"><h6>Form: <span class="badge badge-success"><?php echo $res2[4]; ?></span></h6></a>
                <a class="dropdown-item"><h6>Dose: <span class="badge badge-success"><?php echo $res2[6]; ?></span></h6></a>
                <a class="dropdown-item"><h6>Route: <span class="badge badge-success"><?php echo $res2[7]; ?></span></h6></a>
                <a class="dropdown-item"><h6>Quantity: <span class="badge badge-success"><?php echo $res2[8]; ?></span></h6></a>

              <?php } ?>
              
              <?php
              
              $result3 = mysqli_query($conn, "select name FROM pat_food where time = '$v[$i]'");
              while($res3 = mysqli_fetch_array($result3)){?>

                <h5 class="dropdown-header">Food</h5>
                <a class="dropdown-item"><h6>Food: <span class="badge badge-success"><?php echo $res3[0]; ?></span></h6></a>

              <?php } ?>

            <?php } ?>

          </div>

        </div>

      </div>

    </div>
  <?php $cntr--; $i++; } ?>
  </div>

</div>


</center>
</body>
</html>