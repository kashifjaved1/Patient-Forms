<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Vitals Graph Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php

    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM pat_vitals WHERE id=$id");
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
<center><h2>Patient Vitals Graph Report</h2>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'Sugar Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT sugar_lvl, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient Sugar Level in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('sugar_graph'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Time');
        data.addColumn('number', '');
        data.addColumn('number', 'Sugar Level');
        data.addColumn('number', '');

        data.addRows([
          <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT sugar_lvl, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and sugar_lvl != 0");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str);
          ?>
          [<?php echo $v1; ?>, 0, <?php echo $v0; ?>, 0],
          <?php
            }
          ?>
        ]);

        var options = {
          width: 900,
          height: 500
        };

        var chart = new google.charts.Line(document.getElementById('_graph'));

        chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="sugar_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'Temperature Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT temp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient Temperature in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('temp_graph'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Time');
        data.addColumn('number', '');
        data.addColumn('number', 'Sugar Level');
        data.addColumn('number', '');

        data.addRows([
          <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT sugar_lvl, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and sugar_lvl != 0");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str);
          ?>
          [<?php echo $v1; ?>, 0, <?php echo $v0; ?>, 0],
          <?php
            }
          ?>
        ]);

        var options = {
          width: 900,
          height: 500
        };

        var chart = new google.charts.Line(document.getElementById('_graph'));

        chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="temp_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'Pulse Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT pulse, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient Pulse Level in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('pulse_graph'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Time');
        data.addColumn('number', '');
        data.addColumn('number', 'Sugar Level');
        data.addColumn('number', '');

        data.addRows([
          <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT sugar_lvl, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and sugar_lvl != 0");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str);
          ?>
          [<?php echo $v1; ?>, 0, <?php echo $v0; ?>, 0],
          <?php
            }
          ?>
        ]);

        var options = {
          width: 900,
          height: 500
        };

        var chart = new google.charts.Line(document.getElementById('_graph'));

        chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="pulse_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'Blood Pressure'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT bp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient Blood Pressure in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('bp_graph'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="bp_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'SPO2 Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT SPO2, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient SPO2 in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('sp_graph'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="sp_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'FLO2 Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT FLO2, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient FLO2 in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('FLO2_graph'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="FLO2_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Time', 'Respiratory Level'],
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
          $result = mysqli_query($conn, "SELECT resp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
          while($res = mysqli_fetch_array($result)){
            $v0 = $res[0];
            //$v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
            //$v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
            $glb_var = date('h:i', strtotime(str_replace('-','/', $res[1])));
            $str = str_replace(":", ".", $glb_var);
            $v1 = floatval($str);
            ?>
          ['',  <?php echo $v1; ?>,   <?php echo $v0; ?>],
            <?php
          }
          ?>
        ]);

        var options = {
          title: 'Patient Respiratory Level in Last 24 Hours',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('resp_graph'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="resp_graph" style="width: 900px; height: 500px"></div>
  </body>
</html>

</center>