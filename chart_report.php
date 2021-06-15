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

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'Sugar Level'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT sugar_lvl, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and sugar_lvl != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient Sugar Level in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('sugar_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="sugar_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'Temperature'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT temp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and temp != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient Temperature in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('temp_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="temp_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'Pulse Level'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT pulse, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and pulse != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient Pulse Level in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('pulse_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="pulse_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['', 'Blood Pressure'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT bp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and bp != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient Blood Pressure in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('bp_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="bp_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'SPO2 Level'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT spo2, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and spo2 != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient SPO2 Level in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('spo2_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="spo2_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'FLO2 Level'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT flo2, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and flo2 != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient FLO2 Level in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('flo2Respiratory_Condition'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="flo2Respiratory_Condition" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Time', 'Respiratory Condition'],
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
            $result = mysqli_query($conn, "SELECT resp, time FROM pat_vitals WHERE pat_vitals.time > DATE_SUB(NOW(), INTERVAL 24 HOUR) and resp != 0 and pid=$id");
            while($res = mysqli_fetch_array($result)){
              $v0 = $res[0];
              // Type Casting Possibilities
              // $v1 = (int)date('h:i', strtotime(str_replace('-','/', $res[1])));
              // $v1 = floatval(date('h:i', strtotime(str_replace('-','/', $res[1]))));
              $glb_var = date('H:i', strtotime(str_replace('-','/', $res[1])));
              $str = str_replace(":", ".", $glb_var);
              $v1 = floatval($str); ?>       
              [<?php echo $v1; ?>, <?php echo $v0; ?>],
              <?php
            }
          ?>  
        ]);

        var options = {
          title: 'Patient Respiratory Condition in Last 24 Hours',
          legend: 'none',
          hAxis: { minValue: 0, maxValue: 24 },
          curveType: 'function',
          pointSize: 10
        };

        var chart = new google.visualization.LineChart(document.getElementById('resp_graph'));
        chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="resp_graph" style="width: 900px; height: 500px;"></div>
  </body>
</html>
</center>