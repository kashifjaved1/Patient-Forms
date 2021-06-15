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
<strong style="margin-left: 2%;">Patient: </strong>
<select style="width: 12%; margin-top: 1%; padding: 3px">
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
        $qry = mysqli_query($conn, "SELECT * FROM patient");
        while($res = mysqli_fetch_array($qry)) {
            echo "<option>$res[1]</option>";
            echo $pid = $res[0];
            $patName = $res[1];
        }
    ?>
</select>
<span style="float:right; margin-top: 1%; margin-right: 1%;"><strong style="">Nurse: </strong><input style="border:none; border-bottom: 2px solid black;" value="<?php echo "Login Person Name"; ?>" readonly></span>

<div class="container"><br>
<center><h2>Patient Vitals Management</h2></center><br>
<form class="form-horizontal" action="func.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2">Sugar Level</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="40" max="240" placeholder="Enter Patient Sugar Level here" name="sgr" id="sgr" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 40 to 240.')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Temperature</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="96" max="107" placeholder="Enter Patient Temperature here" name="temp" id="temp" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 96 to 107.')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Pulse</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="50" max="131" placeholder="Enter Patient Pulse here" name="pulse" id="pulse" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 50 to 131.')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Blood Pressure</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="40" max="230" placeholder="Enter Patient Blood Pressure here" name="bp" id="bp" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 40 to 230.')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">SPO2</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="70" max="95" placeholder="Enter Patient SPO2 here" name="spo2" id="spo2" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 70 to 95.')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">FLO2</label>
      <div class="col-sm-10">
        <input type="number" step="0.1" min="0.5" max="10" class="form-control" placeholder="Enter Patient FLO2 here" name="flo2" id="flo2" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 0.5 to 10.0 .')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Respiratory</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" min="14" max="35" placeholder="Enter Patient Respiratory here" name="resp" id="resp" oninvalid="this.setCustomValidity('Error: Invalid value. Value must be in-between 14 to 35.')">
      </div>
    </div>
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <input type="hidden" name="pname" value="<?php echo $patName; ?>">
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="save">Save</button>
      </div>
    </div>
  </form>
</div>
</body>
<script>
  var i1 = document.getElementById("sgr");
  i1.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i2 = document.getElementById("temp");
  i2.oninput = function () {
      document.getElementById("sgr").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i3 = document.getElementById("pulse");
  i3.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("sgr").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i4 = document.getElementById("bp");
  i4.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("sgr").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i5 = document.getElementById("spo2");
  i5.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("sgr").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i6 = document.getElementById("flo2");
  i6.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("sgr").disabled = this.value != "";
      document.getElementById("resp").disabled = this.value != "";
  };

  var i7 = document.getElementById("resp");
  i7.oninput = function () {
      document.getElementById("temp").disabled = this.value != "";
      document.getElementById("pulse").disabled = this.value != "";
      document.getElementById("bp").disabled = this.value != "";
      document.getElementById("spo2").disabled = this.value != "";
      document.getElementById("flo2").disabled = this.value != "";
      document.getElementById("sgr").disabled = this.value != "";
  };
</script>
</html>