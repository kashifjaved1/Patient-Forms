<?php
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Medicine Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            $pname = $res[1];
        }
    ?>
</select>
<center>
<div class="container"><br>
    <h2>Patient Medicine Management</h2>
    <br>
    <form method="post" action="func.php">
    <div class="form-group">
        <div class="row">
        <div class="col-xs-4"><label style="float:left">Medicine:</label>        
        <select class="form-control" name="medn">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
                $qry = mysqli_query($conn, "SELECT * FROM medicine");
                while($res = mysqli_fetch_array($qry)) {
                    echo "<option value='$res[1]'>$res[1]</option>";
                }
            ?>
        </select>

        </div>
        <div class="col-xs-4">
        <label style="float:left">Form:</label>
        <select class="form-control" name="form">
            <option value="Nebulize">Nebulize</option>
            <option value="Tablet">Tablet</option>
        </select>
        </div>
        <div class="col-xs-4"><label style="float:left">Time:</label><input type="time" name="time" required class="form-control"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <div class="col-xs-4"><label style="float:left">Dose:</label><input type="text" name="dose" required class="form-control"></div>
        <div class="col-xs-4">
        <label style="float:left">Route:</label>
        <select class="form-control" name="route">
            <option value="Inhale">Inhale</option>
            <option value="Oral">Oral</option>
        </select>
        </div>
        <div class="col-xs-4"><label style="float:left">Quantity:</label><input type="text" name="qty" required class="form-control"></div>
        </div>
    </div>
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <input type="hidden" name="pname" value="<?php echo $pname; ?>">
    <button type="submit" class="btn btn-default" style="float:left" name="medm">Save</button>
    </form>
</div>
</center>

</body>
</html>
