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
    <title>Vitals Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body></span>
<a href="pat_vitals.php" style="float:right; margin-top: 1%; margin-right: 2%; text-decoration: none; color: black"><i class="fa fa-plus-square" style="font-size:28px;"></i></a> 
<div class="container"><br>
<center><h2>Patient Vitals</h2></center><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th colspan="5">Operations</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $qry = mysqli_query($conn, "SELECT * FROM patient");
    while($res = mysqli_fetch_array($qry)) {
        echo "<tr>";
        echo "<th>$res[0]</th>";
        echo "<th>$res[1]</th>";
        echo "<td>Check Patient's <a href='pat_med_view'>Medicine Record</a> | <a href='pat_food_view.php'>Food Record</a> | <a href='pat_vitals_view.php?id=$res[0]'>Vitals Record</a> OR <a href='delete.php?id=$res[0]&op=delallrec&pid=$res[0]'>Delete Patient's all Record</a></td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>