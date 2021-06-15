<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Vitals Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $rid = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM pat_vitals WHERE id=$rid");
    while($res = mysqli_fetch_array($result))
    {
        $pname = $res[2];
        $sgr = $res[3];
        $temp = $res[4];
        $pulse = $res[5];
        $bp = $res[6];
        $spo2 = $res[7];
        $flo2 = $res[8];
        $resp = $res[9];
    }
?>
<strong style="margin-left: 2%;">Patient: </strong>
<input style="border:none; border-bottom: 2px solid black; margin-top: 1%" value="<?php echo $pname; ?>" readonly>
<span style="float:right; margin-top: 1%; margin-right: 1%;"><strong style="">Nurse: </strong><input style="border:none; border-bottom: 2px solid black;" value="<?php echo "Mrs Naveed"; ?>" readonly></span>
<div class="container"><br>
<center><h2>Patient Vitals Management</h2></center><br>
<form class="form-horizontal" action="func.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Sugar Level</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="<?php echo $sgr;?>" name="sgr">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Temperature</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php echo $temp;?>" name="temp">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Pulse</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="<?php echo $pulse;?>" name="pulse">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Blood Pressure</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="<?php echo $bp;?>" name="bp">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">SPO2</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="<?php echo $spo2;?>" name="spo2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">FLO2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php echo $flo2;?>" name="flo2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Respiratory</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" value="<?php echo $resp;?>" name="resp">
      </div>
    </div>
    <input type="hidden" name="rid" value=<?php echo $_GET['id'];?>>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="update">Update</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>