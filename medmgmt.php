<?php
    session_start();
    error_reporting(0);
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicine Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<br><br><br>
  <center><h2>Medicine Management</h2>
  <form action="func.php" method="post">
    <div class="form-group">
      <label style="margin-left: -40%; width:100%;">Medicine Name</label>
      <input type="text" class="form-control" style="width: 50%;" placeholder="Enter Medicine Name" name="medn" required oninvalid="this.setCustomValidity('Error: Field is Empty. Enter Medicine Name')">
    </div>
    <div class="form-group">    
    <label style="margin-left: -39%; width: 100%">Use (Time Period)</label>
      <select class="form-control" style="width: 50%;" name="medt">
        <option value="Daily">Daily</option>
        <option value="Weekly">Weekly</option>
        <option value="Monthly">Monthly</option>
        <option value="Annual">Annual</option>
        <option value="Emergency">Emergency</option>
        <option value="Supplement & Healing">Supplement & Healing</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: -43%" name="meds">Submit</button>
  </form>
</div>
</center>

</body>
</html>
