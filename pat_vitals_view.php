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
<center><h2>Patient Vitals Record</h2></center><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Record ID</th>
        <th>Name</th>
        <th>Sugar Level</th>
        <th>Temperature</th>
        <th>Pulse</th>
        <th>Blood Pressure</th>
        <th>SPO2</th>
        <th>FLO2</th>
        <th>Respiratory </th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $qry = mysqli_query($conn, "SELECT * FROM pat_vitals ");
    while($res = mysqli_fetch_array($qry)) {
        $rid = $res[0];
        echo "<tr>";
        echo "<th>$rid</th>";
        echo "<th>$res[2]</th>";
        echo "<th>$res[3]</th>";
        echo "<th>$res[4]</th>";
        echo "<th>$res[5]</th>";
        echo "<th>$res[6]</th>";
        echo "<th>$res[7]</th>";
        echo "<th>$res[8]</th>";
        echo "<th>$res[9]</th>";
        echo "<td><a href='pat_vitals_upd.php?id=$rid'>Edit</a> | <a href='delete.php?id=$rid&op=vitalmgmtdel'>Delete</a> | <a href='chart_report.php?id=$res[1]'>Check Report</a></td></tr>";
    }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>