<?php
    session_start();
    error_reporting(0);
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Food Record</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<span style="margin-left: 1%;"><strong style="">Nurse: </strong><input style="border:none; border-bottom: 2px solid black; margin-top: 1%;" value="<?php echo "Fozia Akhtar"; ?>" readonly></span>
<a href="pat_food.php" style="float:right; margin-top: 1%; margin-right: 2%; text-decoration: none; color: black"><i class="fa fa-plus-square" style="font-size:28px;"></i></a> 
<div class="container">
<center><h2>Patient Food Record</h2></center><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Record ID</th>
        <th>Patient Name</th>
        <th>Food</th>
        <th>Form</th>
        <th>Time</th>
        <th>Quantity</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $qry = mysqli_query($conn, "SELECT * FROM pat_food");
    while($res = mysqli_fetch_array($qry)) {
        echo "<tr>";
        echo "<th>$res[0]</th>";
        echo "<th>$res[2]</th>";
        echo "<th>$res[3]</th>";
        echo "<th>$res[4]</th>";
        echo "<th>$res[5]</th>";
        echo "<th>$res[6]</th>";
        echo "<td><a href='pat_food_upd.php?id=$res[0]'>Edit</a> | <a href='delete.php?id=$res[0]&op=foodmgmtdel'>Delete</a></td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>