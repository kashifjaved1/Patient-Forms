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
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $rid = $_GET['id'];
    //$pname = "";
    $result = mysqli_query($conn, "SELECT * FROM pat_food WHERE id=$rid");
    while($res = mysqli_fetch_array($result))
    {
        $pname = $res[2];
        $name = $res[3];
        $form = $res[4];
        $time = $res[5];
        $qty = $res[6];
    }
?>
<strong style="margin-left: 2%;">Patient: </strong>
<input style="border:none; border-bottom: 2px solid black; margin-top: 1%" value="<?php echo $pname; ?>" readonly>
<center>
<div class="container"><br>
    <h2>Patient Food Management</h2>
    <br>
    <form method="post" action="func.php">
    <div class="form-group">
        <div class="row">
        <div class="col-xs-4"><label style="float:left">Food:</label>        
        <select class="form-control" name="food">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
                $qry = mysqli_query($conn, "SELECT * FROM food");
                while($res = mysqli_fetch_array($qry)) {
                    echo "<option value='$res[1]'>$res[1]</option>";
                }
            ?>
        </select>

        </div>
        <div class="col-xs-4">
        <label style="float:left">Form:</label>
        <select class="form-control" name="form">
            <option value="Nebulize">Liquid</option>
            <option value="Tablet">?</option>
        </select>
        </div>
        <div class="col-xs-4"><label style="float:left">Time:</label><input type="time" name="time" required class="form-control" value="<?php echo $time; ?>"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-4"><label style="float:left; display:none;">Dose:</label><input type="hidden" class="form-control"></div>
            <div class="col-xs-4"><label style="float:left">Quantity:</label><input type="text" name="qty" required class="form-control" value="<?php echo $qty; ?>"></div>
            <div class="col-xs-4">
            <label style="float:left;>Route:</label>
            <select class="form-control style="display:none;">
            </select>
            </div>
        </div>
    </div>
    <input type="hidden" name="rid" value="<?php echo $rid; ?>">
    <button type="submit" class="btn btn-default" name="foodu">Update</button>
    </form>
</div>
</center>

</body>
</html>
