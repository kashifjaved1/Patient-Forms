    <?php
    //select time FROM pat_vitals where time >= now() ORDER BY time ASC LIMIT 2
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Patient Food n Medicine Time Display</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
    <center style="margin-top: 25%;">
    <!-- Button to Open the Modal -->
    <?php

        $v = array(); $i = 0; $m = array(); $j = 1;
        $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
        $result = mysqli_query($conn, "select time FROM pat_med where time >= now() ORDER BY time ASC limit 2");
        while($res = mysqli_fetch_array($result)){
            $v[$i] = $res[0];
            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal$j'>$v[$i]</button><br><br>";
            $i++; $j++;
        }
?>
    </center>

    <?php
        $result = mysqli_query($conn, "select * FROM pat_med where time = '$v[0]'");
        while($res = mysqli_fetch_array($result)){?>

    <!-- The Modal -->
    <div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header1 -->
        <div class="modal-header">
<?php
    $time = "";
    $h24 = date('H', strtotime($v[0]));
    $h12 = date('h', strtotime($v[0]));
    $hm12 = date('h:i', strtotime($v[0]));
    if($h24 >= 12){
        $time = $hm12." PM";
    }
    else{
        $time = $hm12." AM";
    }
?>
            <h4 class="col-12 modal-title text-center"><?php echo $time." - Medicine"; ?></h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        
        <!-- Modal body1 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                    <label>Medicine:</label>
                    <input type="text" class="form-control" value="<?php echo $res[3]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Form:</label>
                    <input type="text" class="form-control" value="<?php echo $res[4]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Dose:</label>
                    <input type="text" class="form-control" value="<?php echo $res[6]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Route:</label>
                    <input type="text" class="form-control" value="<?php echo $res[7]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="text" class="form-control" value="<?php echo $res[8]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>
        
        <?php
        }
        $result = mysqli_query($conn, "select * FROM pat_food where time = '$v[0]'");
        while($res = mysqli_fetch_array($result)){?>

        <!-- Modal footer1 -->
        <span class="modal-footer">
        </span>
        
        <!-- Modal Header2 -->
        <div class="modal-header">
<?php
    $time = "";
    $h24 = date('H', strtotime($v[0]));
    $h12 = date('h', strtotime($v[0]));
    $hm12 = date('h:i', strtotime($v[0]));
    if($h24 >= 12){
        $time = $hm12." PM";
    }
    else{
        $time = $hm12." AM";
    }
?>
        <h4 class="col-12 modal-title text-center"><?php echo $time." - Food"; ?></h4>
        </div>

        <!-- Modal body2 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                <label>Food:</label>
                <input type="text" class="form-control" value="<?php echo $res[3]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- Modal footer2 -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
        </div>
    </div>
    </div>

    </div>

    <?php
        $result = mysqli_query($conn, "select * FROM pat_med where time = '$v[1]'");
        while($res = mysqli_fetch_array($result)){?>

    <!-- The Modal2 -->
    <div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header1 -->
        <div class="modal-header">
<?php
    $time_ = "";
    $h24_ = date('H', strtotime($v[1]));
    $h12_ = date('h', strtotime($v[1]));
    $hm12_ = date('h:i', strtotime($v[1]));
    if($h24_ >= 12){
        $time_ = $hm12_." PM";
    }
    else{
        $time_ = $hm12_." AM";
    }
?>
            <h4 class="col-12 modal-title text-center"><?php echo $time_." - Medicine"; ?></h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        
        <!-- Modal body1 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                    <label>Medicine:</label>
                    <input type="text" class="form-control" value="<?php echo $res[3]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Form:</label>
                    <input type="text" class="form-control" value="<?php echo $res[4]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Dose:</label>
                    <input type="text" class="form-control" value="<?php echo $res[6]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Route:</label>
                    <input type="text" class="form-control" value="<?php echo $res[7]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="text" class="form-control" value="<?php echo $res[8]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>
        
        <?php
        }
        $result = mysqli_query($conn, "select * FROM pat_food where time = '$v[1]'");
        while($res = mysqli_fetch_array($result)){?>

        <!-- Modal footer1 -->
        <span class="modal-footer">
        </span>
        
        <!-- Modal Header2 -->
        <div class="modal-header">
<?php
    $time_ = "";
    $h24_ = date('H', strtotime($v[1]));
    $h12_ = date('h', strtotime($v[1]));
    $hm12_ = date('h:i', strtotime($v[1]));
    if($h24_ >= 12){
        $time_ = $hm12_." PM";
    }
    else{
        $time_ = $hm12_." AM";
    }
?>
            <h4 class="col-12 modal-title text-center"><?php echo $time_." - Food"; ?></h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>

        <!-- Modal body2 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                <label>Food:</label>
                <input type="text" class="form-control" value="<?php echo $res[3]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>
        <?php
        }
    ?>
        <!-- Modal footer2 -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
        </div>
    </div>
    </div>

    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header1 -->
        <div class="modal-header">
            <h4 class="col-12 modal-title text-center">Medicine Data of Modal 2</h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        
        <!-- Modal body1 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                    <label>Medicine:</label>
                    <input type="text" class="form-control" value="<?php echo $res[3]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Form:</label>
                    <input type="text" class="form-control" value="<?php echo $res[4]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Dose:</label>
                    <input type="text" class="form-control" value="<?php echo $res[6]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Route:</label>
                    <input type="text" class="form-control" value="<?php echo $res[7]; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="text" class="form-control" value="<?php echo $res[8]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>

        <!-- Modal footer1 -->
        <span class="modal-footer">
        </span>
        
        <!-- Modal Header2 -->
        <div class="modal-header">
        <h4 class="col-12 modal-title text-center">Food</h4>
        </div>

        <!-- Modal body2 -->
        <div class="modal-body">
            <div class="container">
            <form>
                <div class="form-group">
                <label>Food:</label>
                <input type="text" class="form-control" value="<?php echo $res[0]; ?>" readonly>
                </div>
            </form>
            </div>
        </div>

        <!-- Modal footer2 -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
        </div>
    </div>
    </div>

    </div>

</body>
</html>
