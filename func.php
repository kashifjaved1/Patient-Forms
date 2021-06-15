<?php
    session_start();
    $_SESSION['msg'] = "";

    $conn = mysqli_connect('localhost', 'root', '', 'bahmni');
    if($conn){
        echo "connected";
    }
    
    //////////////////////////////////// Patient Vital Insertion ////////////////////////////////////

    if (isset($_POST['save'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $sgr = $_POST['sgr'];
        $temp = $_POST['temp'];
        $pulse = $_POST['pulse'];
        $bp = $_POST['bp'];
        $spo2 = $_POST['spo2'];
        $flo2 = $_POST['flo2'];
        $resp = $_POST['resp'];
        if($sgr == "" && $temp == "" && $pulse == "" && $bp == "" && $spo2 == "" && $flo2 == "" && $resp == ""){
            header('location: vform.php');
        }
        else{
            $chk = mysqli_query($conn, "INSERT INTO pat_vitals(pid, pat_name, sugar_lvl, temp, pulse, bp, spo2, flo2, resp) VALUES ('$pid', '$pname', '$sgr', '$temp', '$pulse', '$bp', '$spo2', '$flo2', '$resp')");
            if($chk == true){
                $_SESSION['msg'] = "<script>alert('Patients Vitals Added Successfully.')</script>";
                header('location: pat_vitals_view.php');
            }
        }
    }

    //////////////////////////////////// Patient Vital Updation ////////////////////////////////////

    if(isset($_POST['update']))
    {
        $rid = $_POST['rid'];
        $sgr = $_POST['sgr'];
        $temp = $_POST['temp'];
        $pulse = $_POST['pulse'];
        $bp = $_POST['bp'];
        $spo2 = $_POST['spo2'];
        $flo2 = $_POST['flo2'];
        $resp = $_POST['resp'];
        $result = mysqli_query($conn, "UPDATE pat_vitals SET sugar_lvl=$sgr, temp=$temp, pulse=$pulse, bp=$bp, spo2=$spo2, flo2=$flo2, resp=$resp WHERE id=$rid");
        if($result == true){
            $_SESSION['msg'] = "<script>alert('Patients Vitals Updated Successfully.')</script>";
            header('location: pat_vitals_view.php');
        }
    }

    //////////////////////////////////// Medicine Insertion ////////////////////////////////////

    if (isset($_POST['meds'])) {
        $medn = $_POST['medn'];
        $medt = $_POST['medt'];

        $chk = mysqli_query($conn, "INSERT INTO medicine(name, uuse) values ('$medn', '$medt')");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Medicine Added Successfully.')</script>";
            header('location: medmgmt.php');
        }
    }

    //////////////////////////////////// Food Insertion ////////////////////////////////////

    if (isset($_POST['foods'])) {
        $foodn = $_POST['foodn'];
        $foodt = $_POST['foodt'];

        $chk = mysqli_query($conn, "INSERT INTO food(name, uuse) values ('$foodn', '$foodt')");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Food Added Successfully.')</script>";
            header('location: foodmgmt.php');
        }
    }

    //////////////////////////////////// Patient Medicine Management ///////////////////////////////////
    
    if (isset($_POST['medm'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $medn = $_POST['medn'];
        $form = $_POST['form'];
        $time = $_POST['time'];
        $dose = $_POST['dose'];
        $route = $_POST['route'];
        $qty = $_POST['qty'];
        $chk = mysqli_query($conn, "INSERT INTO pat_med(pid, pname, name, form, time, dose, route, qty) VALUES ('$pid', '$pname', '$medn', '$form', '$time', '$dose', '$route', '$qty')");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Patient Medicine Management Added Successfully.')</script>";
            header('location: pat_med_view.php');
        }
    }

    //////////////////////////////////// Patient Medicine Updation ///////////////////////////////////
    
    if (isset($_POST['medu'])) {
        $rid = $_POST['rid'];
        $medn = $_POST['medn'];
        $form = $_POST['form'];
        $time = $_POST['time'];
        $dose = $_POST['dose'];
        $route = $_POST['route'];
        $qty = $_POST['qty'];
        $chk = mysqli_query($conn, "UPDATE `pat_med` SET name='$medn', form='$form', time='$time', dose='$dose', route='$route', qty='$qty' where id='$rid'");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Patient Medicine Management Updated Successfully.')</script>";
            header('location: pat_med_view.php');
        }
    }

    //////////////////////////////////// Patient Food Management ///////////////////////////////////
    
    if (isset($_POST['foodm'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $medn = $_POST['food'];
        $form = $_POST['form'];
        $time = $_POST['time'];
        $qty = $_POST['qty'];
        $chk = mysqli_query($conn, "INSERT INTO pat_food(pid, pname, name, form, time, qty) VALUES ('$pid', '$pname', '$medn', '$form', '$time', '$qty')");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Patient Food Management Added Successfully.')</script>";
            header('location: pat_food_view.php');
        }
    }

    //////////////////////////////////// Patient Food Updation ///////////////////////////////////
    
    if (isset($_POST['foodu'])) {
        $rid = $_POST['rid'];
        $food = $_POST['food'];
        $form = $_POST['form'];
        $time = $_POST['time'];
        $qty = $_POST['qty'];
        $chk = mysqli_query($conn, "UPDATE `pat_food` SET name='$food', form='$form', time='$time', qty='$qty' where id='$rid'");
        if($chk == true){
            $_SESSION['msg'] = "<script>alert('Patient Food Management Updated Successfully.')</script>";
            header('location: pat_food_view.php');
        }
    }

?>